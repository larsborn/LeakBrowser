<?php declare(strict_types=1);

namespace App\Search;

use App\Search\FieldType\Type;

class Field
{
    private string $fieldName;
    private Type $type;
    private bool $byValue;
    private bool $byExistence;

    public function __construct(string $fieldName, Type $type, bool $byValue, bool $byExistence)
    {
        $this->fieldName = $fieldName;
        $this->type = $type;
        $this->byValue = $byValue;
        $this->byExistence = $byExistence;
    }

    public function getFieldName(): string
    {
        return $this->fieldName;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function allowByValue(): bool
    {
        return $this->byValue;
    }

    public function allowByExistence(): bool
    {
        return $this->byExistence;
    }

    public function getGetParameter(): string
    {
        return str_replace('.', '_', $this->fieldName);
    }
}
