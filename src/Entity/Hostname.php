<?php declare(strict_types=1);

namespace App\Entity;

class Hostname extends ArangoEntity
{
    private string $value;

    public function __construct(string $id, string $value)
    {
        $this->id = $id;
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
