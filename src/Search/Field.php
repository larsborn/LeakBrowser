<?php declare(strict_types=1);

namespace App\Search;

use App\Search\FieldType\Type;

class Field
{
    private string $fieldName;
    private Type $type;

    public function __construct(string $fieldName, Type $type)
    {
        $this->fieldName = $fieldName;
        $this->type = $type;
    }

    public function getFieldName(): string
    {
        return $this->fieldName;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function getGetParameter(): string
    {
        return str_replace('.', '_', $this->fieldName);
    }
}
