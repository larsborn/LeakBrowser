<?php declare(strict_types=1);

namespace App\DTO;

use App\Search\Configuration;
use Symfony\Component\HttpFoundation\Request;

class SearchRequest
{
    public function __construct(
        public readonly Configuration $configuration,
        public readonly int $page,
        public readonly array $filterValues,
        public readonly array $fieldsExist,
    ) {
    }

    public static function fromRequest(Configuration $configuration, Request $request): self
    {
        $filterValues = [];
        $fieldsExist = [];
        $existenceParameter = $request->query->all($configuration->getExistenceGetParameterName());
        foreach ($configuration->getFields() as $field) {
            if ($field->allowByValue()) {
                $value = $request->query->get($field->getGetParameter());
                if ($value) {
                    $filterValues[$field->getGetParameter()] = $value;
                }
            }
            if ($field->allowByExistence()) {
                if (in_array($field->getFieldName(), $existenceParameter)) {
                    $fieldsExist[] = $field->getFieldName();
                }
            }
        }

        return new SearchRequest($configuration, (int)$request->query->get('page', '0'), $filterValues, $fieldsExist);
    }
}
