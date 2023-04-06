<?php declare(strict_types=1);

namespace App\Repository;

use App\Arango\AbstractArangoRepository;
use App\Entity\EmailAddress;
use App\InputHelper;
use ArangoDBClient\Document;

/**
 * @template-extends AbstractArangoRepository<EmailAddress>
 */
class EmailAddressRepository extends AbstractArangoRepository
{
    protected function getCollectionName(): string
    {
        return 'email_addresses';
    }

    protected function constructEntity(Document $document): object
    {
        return new EmailAddress($document->getId(), InputHelper::string($document->get('value')));
    }

    public function find(string $emailAddress): ?EmailAddress
    {
        $result = $this->aql(
            'FOR row in email_addresses FILTER row.value == @value LIMIT 1 RETURN row',
            ['value' => $emailAddress]
        );

        return count($result) === 1 ? $result[0] : null;
    }
}
