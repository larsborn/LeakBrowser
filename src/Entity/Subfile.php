<?php declare(strict_types=1);

namespace App\Entity;

class Subfile
{
    private string $id;
    private Sample $parent;
    private Sample $child;

    /**
     * @var string[]
     */
    private array $paths;

    public function __construct(string $id, Sample $parent, Sample $child, ?array $paths)
    {
        $this->id = $id;
        $this->parent = $parent;
        $this->child = $child;
        $this->paths = $paths === null ? [] : $paths;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getParent(): Sample
    {
        return $this->parent;
    }

    public function getChild(): Sample
    {
        return $this->child;
    }

    /**
     * @return string[]
     */
    public function getPaths(): array
    {
        return $this->paths;
    }
}
