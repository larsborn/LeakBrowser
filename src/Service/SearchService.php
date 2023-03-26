<?php declare(strict_types=1);

namespace App\Service;

class SearchService
{
    public function isSha256(string $s): bool
    {
        return preg_match("/^([a-f0-9]{64})$/", $s) === 1;
    }
}
