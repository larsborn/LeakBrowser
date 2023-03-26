<?php declare(strict_types=1);

namespace App\DTO;

use DateTimeImmutable;

class Timestamp
{
    private DateTimeImmutable $value;
    private ?string $description;

    public function __construct(DateTimeImmutable $value, ?string $description)
    {
        $this->value = $value;
        $this->description = $description;
    }

    public function getValue(): DateTimeImmutable
    {
        return $this->value;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
