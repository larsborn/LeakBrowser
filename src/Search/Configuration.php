<?php declare(strict_types=1);

namespace App\Search;

class Configuration
{
    /**
     * @var Field[]
     */
    private array $fields;

    private string $existenceGetParameterName;

    /**
     * @param Field[] $fields
     */
    public function __construct(array $fields, string $existenceGetParameterName)
    {
        $this->fields = $fields;
        $this->existenceGetParameterName = $existenceGetParameterName;
    }

    /**
     * @return Field[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    public function getExistenceGetParameterName(): string
    {
        return $this->existenceGetParameterName;
    }
}
