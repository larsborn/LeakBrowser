<?php

declare(strict_types=1);

namespace App\Entity;

class Sample extends ArangoEntity
{
    private ?int $crc32;
    private ?string $md5;
    private ?string $sha1;
    private ?string $sha256;
    private ?int $size;
    private ?string $fileMagic;
    private ?string $mimeType;
    private ?string $fileExtension;
    private ?array $email;
    private ?array $image;
    private ?string $thumbnail;

    /**
     * @var string[]
     */
    private array $fileNames;

    public function __construct(
        string $id,
        ?int $crc32,
        ?string $md5,
        ?string $sha1,
        ?string $sha256,
        ?int $size,
        ?string $fileMagic,
        ?string $mimeType,
        ?string $fileExtension,
        ?array $fileNames,
        ?array $email,
        ?array $image,
        ?string $thumbnail,
    ) {
        $this->id = $id;
        $this->crc32 = $crc32;
        $this->md5 = $md5;
        $this->sha1 = $sha1;
        $this->sha256 = $sha256;
        $this->size = $size;
        $this->fileMagic = $fileMagic;
        $this->mimeType = $mimeType;
        $this->fileExtension = $fileExtension;
        $this->fileNames = $fileNames === null ? [] : $fileNames;
        $this->email = $email;
        $this->image = $image;
        $this->thumbnail = $thumbnail;
    }

    public function getCrc32(): ?int
    {
        return $this->crc32;
    }

    public function getMd5(): ?string
    {
        return $this->md5;
    }

    public function getSha1(): ?string
    {
        return $this->sha1;
    }

    public function getSha256(): ?string
    {
        return $this->sha256;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function getFileMagic(): ?string
    {
        return $this->fileMagic;
    }

    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    public function getFileExtension(): ?string
    {
        return $this->fileExtension;
    }

    /**
     * @return string[]
     */
    public function getFileNames(): array
    {
        return $this->fileNames;
    }

    public function isMail(): bool
    {
        if ($this->fileExtension === 'eml') {
            return true;
        }

        if (! $this->fileMagic) {
            return false;
        }

        return stripos($this->fileMagic, 'mail') !== false;
    }

    public function getEmail(): ?array
    {
        return $this->email;
    }

    public function getImage(): ?array
    {
        return $this->image;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }
}
