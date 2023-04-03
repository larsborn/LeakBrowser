<?php declare(strict_types=1);

namespace App\Search;

class Configuration
{
    /**
     * @var Field[]
     */
    private array $fields;

    /**
     * @param Field[] $fields
     */
    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return Field[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}
