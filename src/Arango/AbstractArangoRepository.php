<?php

declare(strict_types=1);

namespace App\Arango;

use App\InputHelper;
use ArangoDBClient\ClientException;
use ArangoDBClient\Collection;
use ArangoDBClient\CollectionHandler;
use ArangoDBClient\Document;
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

    public function __construct(ArangoDatabase $arangoDatabase)
    {
        $this->arangoDatabase = $arangoDatabase;
        $collection = new Collection($this->getCollectionName());
        $this->collectionHandler = new CollectionHandler($arangoDatabase->getConnection());
        $this->collectionId = $this->collectionHandler->get($collection);
    }

    /**
     * @return list<T>
     */
    public function findAll(): array
    {
        $ret = [];
        try {
            foreach ($this->collectionHandler->all($this->collectionId) as $document) {
                $ret[] = $this->constructEntity(InputHelper::type($document, Document::class));
            }
        } catch (ClientException|Exception $e) {
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
}
