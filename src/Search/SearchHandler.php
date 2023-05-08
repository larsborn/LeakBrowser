<?php declare(strict_types=1);

namespace App\Search;

use App\DTO\SearchRequest;
use App\Repository\SampleRepository;
use App\Search\FieldType\IntegerType;
use App\Search\FieldType\StringArrayType;
use App\Search\FieldType\StringFieldInArrayType;
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

    public function handle(Configuration $configuration, SearchRequest $searchRequest): SearchResponse
    {
        $limit = 10;
        $lines = [];
        $params = [];
        $humanReadableQuery = [];
        foreach ($configuration->getFields() as $field) {
            if (in_array($field->getFieldName(), ['limit', 'offset'])) {
                throw new RuntimeException(sprintf('Field with name "%s" not allowed', $field->getFieldName()));
            }
            if (in_array($field->getFieldName(), $params)) {
                throw new RuntimeException(sprintf('Duplicate field: "%s"', $field->getFieldName()));
            }
            if (!isset($searchRequest->filterValues[$field->getGetParameter()])) {
                continue;
            }
            $filterValue = $searchRequest->filterValues[$field->getGetParameter()];
            $fieldType = $field->getType();
            if ($fieldType instanceof StringType) {
                $lines[] = sprintf('FILTER doc.%s == @%s', $field->getFieldName(), $field->getGetParameter());
                $params[$field->getGetParameter()] = $filterValue;
                $humanReadableQuery[] = sprintf('%s: "%s"', $field->getFieldName(), $filterValue);
            } elseif ($fieldType instanceof StringArrayType) {
                $lines[] = sprintf('FILTER @%s IN doc.%s', $field->getGetParameter(), $field->getFieldName());
                $params[$field->getGetParameter()] = $filterValue;
                $humanReadableQuery[] = sprintf('%s:  "%s"', $field->getFieldName(), $filterValue);
            } elseif ($fieldType instanceof StringFieldInArrayType) {
                $lines[] = sprintf(
                    'FILTER @%s IN doc.%s[*].%s',
                    $field->getGetParameter(),
                    $field->getFieldName(),
                    $fieldType->getSubFieldName()
                );
                $params[$field->getGetParameter()] = $filterValue;
                $humanReadableQuery[] = sprintf('%s:  "%s"', $field->getFieldName(), $filterValue);
            } elseif ($fieldType instanceof IntegerType) {
                $lines[] = sprintf('FILTER doc.%s == @%s', $field->getFieldName(), $field->getGetParameter());
                $params[$field->getGetParameter()] = (int)$filterValue;
                $humanReadableQuery[] = sprintf('%s: %s', $field->getFieldName(), $filterValue);
            } else {
                throw new RuntimeException(sprintf('Unhandled field type: "%s"', $fieldType::class));
            }
        }
        dump($lines);
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
                ['limit' => $limit, 'offset' => $searchRequest->page * $limit] + $params
            );
            $totalCount = $this->sampleRepository->countBy($filter, $params);
        }

        return new SearchResponse(
            $searchRequest->page,
            $limit,
            $totalCount,
            $configuration,
            $data,
            implode(' ', $humanReadableQuery)
        );
    }
}
