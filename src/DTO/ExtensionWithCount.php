<?php declare(strict_types=1);

namespace App\DTO;

class ExtensionWithCount
{
    public string $extension;
    public int $count;

    public function __construct(string $extension, int $count)
    {
        $this->extension = $extension;
        $this->count = $count;
    }
}
