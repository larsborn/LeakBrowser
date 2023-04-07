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

    public function find(string $username): ?Username
    {
        $result = $this->aql(
            'FOR row in usernames FILTER row.value == @value LIMIT 1 RETURN row',
            ['value' => $username]
        );

        return count($result) === 1 ? $result[0] : null;
    }
}
