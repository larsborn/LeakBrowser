<?php

declare(strict_types=1);

namespace App\Arango;

use App\InputHelper;
use ArangoDBClient\Collection;
use ArangoDBClient\CollectionHandler;
use ArangoDBClient\Document;
use ArangoDBClient\DocumentHandler;
use ArangoDBClient\Exception;
use ArangoDBClient\Statement;

/**
 * @template T
 */
abstract class AbstractArangoRepository
{
    private ArangoDatabase $arangoDatabase;
    private Collection $collectionId;
    private CollectionHandler $collectionHandler;
    private DocumentHandler $documentHandler;

    public function __construct(ArangoDatabase $arangoDatabase)
    {
        $this->arangoDatabase = $arangoDatabase;
        $collection = new Collection($this->getCollectionName());
        $this->collectionHandler = new CollectionHandler($arangoDatabase->getConnection());
        $this->collectionId = $this->collectionHandler->get($collection);
        $this->documentHandler = new DocumentHandler($arangoDatabase->getConnection());
    }

    /**
     * @return ?T
     */
    public function get(string $id): ?object
    {
        return $this->constructEntity($this->getDocumentHandler()->get($this->getCollectionName(), $id));
    }

    /**
     * @param string[] $ids
     * @return T[]
     */
    public function getAll(array $ids): array
    {
        return array_map(
            fn(Document $row) => $this->constructEntity($row),
            $this->aql(
                sprintf('FOR row in %s FILTER row._id IN @ids RETURN row', $this->getCollectionName()),
                ['ids' => $ids]
            )
        );
    }

    /**
     * @return list<T>
     */
    public function findAll(): array
    {
        $ret = [];
        foreach ($this->collectionHandler->all($this->collectionId) as $document) {
            $ret[] = $this->constructEntity(InputHelper::type($document, Document::class));
        }

        return $ret;
    }

    abstract protected function getCollectionName(): string;

    /**
     * @return T
     */
    abstract protected function constructEntity(Document $document): object;

    /**
     * @throws Exception
     */
    public function aql(string $query, array $bindVars): array
    {
        $statement = new Statement(
            $this->arangoDatabase->getConnection(),
            [
                "query" => $query,
                "count" => true,
                "batchSize" => 1000,
                "sanitize" => true,
                "bindVars" => $bindVars,
            ]
        );

        $ret = [];
        foreach ($statement->execute() as $key => $value) {
            $ret[$key] = $value;
        }

        return $ret;
    }

    protected function getDocumentHandler(): DocumentHandler
    {
        return $this->documentHandler;
    }

    public function countAll(): int
    {
        return $this->aql(
            sprintf('FOR row IN %s COLLECT WITH COUNT INTO cnt RETURN cnt', $this->getCollectionName()),
            []
        )[0];
    }
}
