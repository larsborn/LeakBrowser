<?php declare(strict_types=1);

namespace App\DTO;

use App\Entity\Source;

final class SourceWithCount
{
    public Source $source;
    public int $count;

    public function __construct(Source $source, int $count)
    {
        $this->source = $source;
        $this->count = $count;
    }
}
