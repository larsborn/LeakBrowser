<?php declare(strict_types=1);

namespace App\Search\FieldType;

class StringFieldInArrayType implements Type
{
    private string $subFieldName;

    public function __construct(string $subFieldName)
    {
        $this->subFieldName = $subFieldName;
    }

    public function getSubFieldName(): string
    {
        return $this->subFieldName;
    }
}
