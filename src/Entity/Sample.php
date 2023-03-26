<?php

declare(strict_types=1);

namespace App\Entity;

class Sample
{
    private string $id;
    private int $crc32;
    private string $md5;
    private string $sha1;
    private string $sha256;
    private int $size;
    private ?string $fileMagic;

    /**
     * @var string[]
     */
    private array $fileNames;

    public function __construct(
        string $id,
        int $crc32,
        string $md5,
        string $sha1,
        string $sha256,
        int $size,
        ?string $fileMagic,
        ?array $fileNames,
    ) {
        $this->id = $id;
        $this->crc32 = $crc32;
        $this->md5 = $md5;
        $this->sha1 = $sha1;
        $this->sha256 = $sha256;
        $this->size = $size;
        $this->fileMagic = $fileMagic;
        $this->fileNames = $fileNames === null ? [] : $fileNames;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCrc32(): int
    {
        return $this->crc32;
    }

    public function getMd5(): string
    {
        return $this->md5;
    }

    public function getSha1(): string
    {
        return $this->sha1;
    }

    public function getSha256(): string
    {
        return $this->sha256;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getFileMagic(): ?string
    {
        return $this->fileMagic;
    }

    /**
     * @return string[]
     */
    public function getFileNames(): array
    {
        return $this->fileNames;
    }
}
