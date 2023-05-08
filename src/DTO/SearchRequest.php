<?php declare(strict_types=1);

namespace App\DTO;

use App\Search\Configuration;
use Symfony\Component\HttpFoundation\Request;

class SearchRequest
{
    public function __construct(
        public readonly int $page,
        public readonly array $filterValues,
        public readonly array $headersExist,
    ) {
    }

    public static function fromRequest(Configuration $configuration, Request $request): self
    {
        $filterValues = [];
        foreach ($configuration->getFields() as $field) {
            if ($field->allowByValue()) {
                $value = $request->query->get($field->getGetParameter());
                if (! $value) {
                    continue;
                }
                $filterValues[$field->getGetParameter()] = $value;
            }
        }

        return new SearchRequest((int)$request->get('page', '0'), $filterValues, []);
    }
}
