<?php declare(strict_types=1);

namespace App\Search;

use App\DTO\SearchRequest;
use App\Repository\SampleRepository;
use App\Search\FieldType\IntegerType;
use App\Search\FieldType\StringArrayType;
use App\Search\FieldType\StringFieldInArrayType;
use App\Search\FieldType\StringType;
use RuntimeException;

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

    private function handleFilterValue(SearchState $searchState, Field $field, SearchRequest $searchRequest): void
    {
        $filterValue = $searchRequest->filterValues[$field->getGetParameter()];
        $fieldType = $field->getType();
        if ($fieldType instanceof StringType) {
            $searchState->lines[] = sprintf('FILTER doc.%s == @%s', $field->getFieldName(), $field->getGetParameter());
            $searchState->params[$field->getGetParameter()] = $filterValue;
            $searchState->humanReadableQuery[] = sprintf('%s: "%s"', $field->getFieldName(), $filterValue);
        } elseif ($fieldType instanceof StringArrayType) {
            $searchState->lines[] = sprintf('FILTER @%s IN doc.%s', $field->getGetParameter(), $field->getFieldName());
            $searchState->params[$field->getGetParameter()] = $filterValue;
            $searchState->humanReadableQuery[] = sprintf('%s:  "%s"', $field->getFieldName(), $filterValue);
        } elseif ($fieldType instanceof StringFieldInArrayType) {
            $searchState->lines[] = sprintf(
                'FILTER @%s IN doc.%s[*].%s',
                $field->getGetParameter(),
                $field->getFieldName(),
                $fieldType->getSubFieldName()
            );
            $searchState->params[$field->getGetParameter()] = $filterValue;
            $searchState->humanReadableQuery[] = sprintf('%s:  "%s"', $field->getFieldName(), $filterValue);
        } elseif ($fieldType instanceof IntegerType) {
            $searchState->lines[] = sprintf('FILTER doc.%s == @%s', $field->getFieldName(), $field->getGetParameter());
            $searchState->params[$field->getGetParameter()] = (int)$filterValue;
            $searchState->humanReadableQuery[] = sprintf('%s: %s', $field->getFieldName(), $filterValue);
        } else {
            throw new RuntimeException(sprintf('Unhandled field type: "%s"', $fieldType::class));
        }
    }

    public function handle(Configuration $configuration, SearchRequest $searchRequest): SearchResponse
    {
        $limit = 10;
        $searchState = new SearchState([], [], []);
        foreach ($configuration->getFields() as $field) {
            if (in_array($field->getFieldName(), ['limit', 'offset'])) {
                throw new RuntimeException(sprintf('Field with name "%s" not allowed', $field->getFieldName()));
            }
            if (in_array($field->getFieldName(), $searchState->params)) {
                throw new RuntimeException(sprintf('Duplicate field: "%s"', $field->getFieldName()));
            }
            if (isset($searchRequest->filterValues[$field->getGetParameter()])) {
                $this->handleFilterValue($searchState, $field, $searchRequest);
            }
        }
        $filter = implode("\n", $searchState->lines);
        if (count($searchState->lines) === 0) {
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
                ['limit' => $limit, 'offset' => $searchRequest->page * $limit] + $searchState->params
            );
            $totalCount = $this->sampleRepository->countBy($filter, $searchState->params);
        }

        return new SearchResponse(
            $searchRequest->page,
            $limit,
            $totalCount,
            $configuration,
            $data,
            implode(' ', $searchState->humanReadableQuery)
        );
    }
}
