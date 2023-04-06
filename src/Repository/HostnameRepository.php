<?php declare(strict_types=1);

namespace App\Repository;

use App\Arango\AbstractArangoRepository;
use App\Entity\Hostname;
use App\InputHelper;
use ArangoDBClient\Document;

/**
 * @template-extends AbstractArangoRepository<Hostname>
 */
class HostnameRepository extends AbstractArangoRepository
{
    protected function getCollectionName(): string
    {
        return 'hostnames';
    }

    protected function constructEntity(Document $document): object
    {
        return new Hostname($document->getId(), InputHelper::string($document->get('value')));
    }
}
