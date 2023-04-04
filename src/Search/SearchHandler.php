<?php declare(strict_types=1);

namespace App\Search;

use App\Repository\SampleRepository;
use App\Search\FieldType\IntegerType;
use App\Search\FieldType\StringType;
use RuntimeException;
use Symfony\Component\HttpFoundation\Request;

class SearchHandler
{
    private SampleRepository $sampleRepository;

    public function __construct(SampleRepository $sampleRepository)
    {
        $this->sampleRepository = $sampleRepository;
    }

    public function isSha256(string $s): bool
    {
        return preg_match("/^([a-f0-9]{64})$/", $s) === 1;
    }

    public function handle(Configuration $configuration, Request $request): SearchResponse
    {
        $limit = 10;
        $page = (int)$request->query->get('page', '0');
        $lines = [];
        $params = [];
        $humanReadableQuery = [];
        dump($request->query);
        foreach ($configuration->getFields() as $field) {
            dump($field);
            if (in_array($field->getFieldName(), ['limit', 'offset'])) {
                throw new RuntimeException(sprintf('Field with name "%s" not allowed', $field->getFieldName()));
            }
            if (in_array($field->getFieldName(), $params)) {
                throw new RuntimeException(sprintf('Duplicate field: "%s"', $field->getFieldName()));
            }
            $filterValue = $request->query->get($field->getGetParameter());
            dump($filterValue);
            if (! $filterValue) {
                continue;
            }
            if ($field->getType() instanceof StringType) {
                $lines[] = sprintf('FILTER doc.%s == @%s', $field->getFieldName(), $field->getGetParameter());
                $params[$field->getGetParameter()] = $filterValue;
                $humanReadableQuery[] = sprintf('%s: "%s"', $field->getFieldName(), $filterValue);
            } elseif ($field->getType() instanceof IntegerType) {
                $lines[] = sprintf('FILTER doc.%s == @%s', $field->getFieldName(), $field->getGetParameter());
                $params[$field->getGetParameter()] = (int)$filterValue;
                $humanReadableQuery[] = sprintf('%s: %s', $field->getFieldName(), $filterValue);
            } else {
                throw new RuntimeException(sprintf('Unhandled field type: "%s"', $field->getType()::class));
            }
        }
        $filter = implode("\n", $lines);
        if (count($lines) === 0) {
            $data = [];
            $totalCount = 0;
        } else {
            $data = $this->sampleRepository->aql(
                <<<AQL
FOR doc in samples
    $filter
    SORT doc.sha256
    LIMIT @offset, @limit
    RETURN doc
AQL,
                ['limit' => $limit, 'offset' => $page * $limit] + $params
            );
            $totalCount = $this->sampleRepository->countBy($filter, $params);
        }

        return new SearchResponse(
            $page,
            $limit,
            $totalCount,
            $configuration,
            $data,
            implode(' ', $humanReadableQuery)
        );
    }
}
