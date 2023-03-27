<?php declare(strict_types=1);

namespace App\Twig;

use DateTimeImmutable;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class DateExtension extends AbstractExtension
{

    public function getFilters(): array
    {
        return [
            new TwigFilter('formatDateTimeAllowEmpty', [$this, 'formatDateTimeAllowEmpty']),
        ];
    }

    public function formatDateTimeAllowEmpty(?DateTimeImmutable $data, string $whenEmpty = '-'): string
    {
        if ($data === null || $data->diff(new DateTimeImmutable('now'))->y > 1000) {
            return $whenEmpty;
        }

        return $data->format('Y-m-d H:i:s');
    }
}
