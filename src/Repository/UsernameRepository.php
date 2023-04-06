<?php declare(strict_types=1);

namespace App\Repository;

use App\Arango\AbstractArangoRepository;
use App\Entity\Username;
use App\InputHelper;
use ArangoDBClient\Document;

/**
 * @template-extends AbstractArangoRepository<Username>
 */
class UsernameRepository extends AbstractArangoRepository
{
    protected function getCollectionName(): string
    {
        return 'usernames';
    }

    protected function constructEntity(Document $document): object
    {
        return new Username($document->getId(), InputHelper::string($document->get('value')));
    }
}
