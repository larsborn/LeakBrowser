<?php

declare(strict_types=1);

namespace App\Entity;

class Source extends ArangoEntity
{
    private string $name;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIdSuffix(): string
    {
        return explode('/', $this->id)[1];
    }
}
