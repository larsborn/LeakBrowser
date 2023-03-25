<?php declare(strict_types=1);

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class FileSizeExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('fileSize', [$this, 'fileSize']),
        ];
    }

    public function fileSize(string $size): string
    {
        $units = array('B', 'KiB', 'MiB', 'GiB', 'TiB');
        $size = max((int)$size, 0);
        $pow = min(floor(($size ? log($size) : 0) / log(1024)), count($units) - 1);
        $size /= pow(1024, $pow);

        return round($size, 2) . ' ' . $units[$pow];
    }
}
