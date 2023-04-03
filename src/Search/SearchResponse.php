<?php declare(strict_types=1);

namespace App\Search;

class SearchResponse
{
    private int $page;
    private ?int $limit;
    private int $total;
    private Configuration $configuration;
    private array $data;
    private array $params;

    public function __construct(
        int $page,
        ?int $limit,
        int $total,
        Configuration $configuration,
        array $data,
        array $params
    ) {
        $this->page = $page;
        $this->limit = $limit;
        $this->total = $total;
        $this->configuration = $configuration;
        $this->data = $data;
        $this->params = $params;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getConfiguration(): Configuration
    {
        return $this->configuration;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getPageCount(): int
    {
        return (int)ceil($this->total / $this->limit);
    }

    /**
     * @return array<array-key, string>
     */
    public function getParams(): array
    {
        return $this->params;
    }
}
