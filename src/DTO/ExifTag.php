<?php declare(strict_types=1);

namespace App\DTO;

use App\Enum\ExifType;
use Patchlevel\Enum\Enum;

class ExifTag
{
    public int $tag;
    public Enum $key;
    public ExifType $type;
    public string $description;

    public function __construct(int $tag, Enum $key, ExifType $type, string $description)
    {
        $this->tag = $tag;
        $this->key = $key;
        $this->type = $type;
        $this->description = $description;
    }
}
