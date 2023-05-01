<?php declare(strict_types=1);

namespace App\DTO;

class EmailsInMonth
{
    public function __construct(public readonly int $year, public readonly int $month, public readonly int $mailCount)
    {
    }
}
