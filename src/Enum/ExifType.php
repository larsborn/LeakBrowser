<?php declare(strict_types=1);

namespace App\Enum;

use Patchlevel\Enum\Enum;

/**
 * @psalm-immutable
 */
class ExifType extends Enum
{
    private const ASCII = 'Ascii';
    private const BYTE = 'Byte';
    private const COMMENT = 'Comment';
    private const DOUBLE = 'Double';
    private const FLOAT = 'Float';
    private const LONG = 'Long';
    private const RATIONAL = 'Rational';
    private const SHORT = 'Short';
    private const S_RATIONAL = 'SRational';
    private const S_SHORT = 'SShort';
    private const UNDEFINED = 'Undefined';

    public static function Ascii(): self
    {
        return self::get(self::ASCII);
    }

    public static function Byte(): self
    {
        return self::get(self::BYTE);
    }

    public static function Comment(): self
    {
        return self::get(self::COMMENT);
    }

    public static function Double(): self
    {
        return self::get(self::DOUBLE);
    }

    public static function Float(): self
    {
        return self::get(self::FLOAT);
    }

    public static function Long(): self
    {
        return self::get(self::LONG);
    }

    public static function Rational(): self
    {
        return self::get(self::RATIONAL);
    }

    public static function Short(): self
    {
        return self::get(self::SHORT);
    }

    public static function SRational(): self
    {
        return self::get(self::S_RATIONAL);
    }

    public static function SShort(): self
    {
        return self::get(self::S_SHORT);
    }

    public static function Undefined(): self
    {
        return self::get(self::UNDEFINED);
    }
}
