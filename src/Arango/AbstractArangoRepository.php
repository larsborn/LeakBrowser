<?php

declare(strict_types=1);

namespace App\Arango;

use App\InputHelper;
use ArangoDBClient\ClientException;
use ArangoDBClient\Collection;
use ArangoDBClient\CollectionHandler;
use ArangoDBClient\Document;
use ArangoDBClient\Exception;

/**
 * @template T
 */
abstract class AbstractArangoRepository
{
    private Collection $collectionId;
    private CollectionHandler $collectionHandler;

    public function __construct(ArangoDatabase $arangoDatabase)
    {
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
}
