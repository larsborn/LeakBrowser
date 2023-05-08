<?php declare(strict_types=1);

namespace App\Search;

class SearchState
{
    public function __construct(
        public array $lines,
        public array $params,
        public array $humanReadableQuery,
    ) {
    }
}
