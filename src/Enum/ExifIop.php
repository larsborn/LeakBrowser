<?php declare(strict_types=1);

namespace App\Enum;

use Patchlevel\Enum\Enum;

/**
 * @psalm-immutable
 */
class ExifIop extends Enum
{
    private const INTEROPERABILITY_INDEX = 'InteroperabilityIndex';
    private const INTEROPERABILITY_VERSION = 'InteroperabilityVersion';
    private const RELATED_IMAGE_FILE_FORMAT = 'RelatedImageFileFormat';
    private const RELATED_IMAGE_WIDTH = 'RelatedImageWidth';
    private const RELATED_IMAGE_LENGTH = 'RelatedImageLength';

    public static function InteroperabilityIndex(): self
    {
        return self::get(self::INTEROPERABILITY_INDEX);
    }

    public static function InteroperabilityVersion(): self
    {
        return self::get(self::INTEROPERABILITY_VERSION);
    }

    public static function RelatedImageFileFormat(): self
    {
        return self::get(self::RELATED_IMAGE_FILE_FORMAT);
    }

    public static function RelatedImageWidth(): self
    {
        return self::get(self::RELATED_IMAGE_WIDTH);
    }

    public static function RelatedImageLength(): self
    {
        return self::get(self::RELATED_IMAGE_LENGTH);
    }

    public static function fromString(string $value): self
    {
        return self::get($value);
    }
}
