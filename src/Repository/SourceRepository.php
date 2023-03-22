<?php declare(strict_types=1);

namespace App\Repository;

use App\Arango\AbstractArangoRepository;
use App\Entity\Source;
use ArangoDBClient\Document;

/**
 * @template-extends AbstractArangoRepository<Source>
 */
class SourceRepository extends AbstractArangoRepository
{
    protected function getCollectionName(): string
    {
        return 'sources';
    }

    protected function constructEntity(Document $document): Source
    {
        return new Source($document->getId(), $document->get('name'));
    }
}
