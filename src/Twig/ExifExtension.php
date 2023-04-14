<?php declare(strict_types=1);

namespace App\Twig;

use App\Repository\ExifTagRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class ExifExtension extends AbstractExtension
{
    private ExifTagRepository $exifTagRepository;

    public function __construct(ExifTagRepository $exifTagRepository)
    {
        $this->exifTagRepository = $exifTagRepository;
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('exifIdToKey', [$this, 'exifIdToKey']),
        ];
    }

    public function exifIdToKey(int $id): string
    {
        $exifTag = $this->exifTagRepository->findById($id);
        if ($exifTag === null) {
            return sprintf('%s (unknown)', $id);
        }

        return $exifTag->key->toString();
    }
}
