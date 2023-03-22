<?php

declare(strict_types=1);

namespace App\Repository;

use App\Arango\AbstractArangoRepository;
use App\Entity\Sample;
use App\InputHelper;
use ArangoDBClient\Document;

/**
 * @template-extends AbstractArangoRepository<Sample>
 */
class SampleRepository extends AbstractArangoRepository
{
    protected function getCollectionName(): string
    {
        return 'samples';
    }

    protected function constructEntity(Document $document): object
    {
        return new Sample(
            $document->getId(),
            InputHelper::int($document->get('crc32')),
            InputHelper::string($document->get('md5')),
            InputHelper::string($document->get('sha1')),
            InputHelper::string($document->get('sha256')),
            InputHelper::int($document->get('size')),
        );
    }
}
