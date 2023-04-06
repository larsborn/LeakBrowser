<?php declare(strict_types=1);

namespace App\Entity;

class EmailAddress
{
    private string $id;
    private string $value;

    public function __construct(string $id, string $value)
    {
        $this->id = $id;
        $this->value = $value;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
