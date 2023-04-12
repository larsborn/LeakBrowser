<?php declare(strict_types=1);

namespace App\Entity;

use App\DTO\Path;

class Subfile extends ArangoEntity
{
    private Sample $parent;
    private Sample $child;

    /**
     * @var Path[]
     */
    private array $paths;

    /**
     * @param Path[]|null $paths
     */
    public function __construct(string $id, Sample $parent, Sample $child, ?array $paths)
    {
        $this->id = $id;
        $this->parent = $parent;
        $this->child = $child;
        $this->paths = $paths === null ? [] : $paths;
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
     * @return Path[]
     */
    public function getPaths(): array
    {
        return $this->paths;
    }
}
