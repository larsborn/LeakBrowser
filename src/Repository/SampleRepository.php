<?php

declare(strict_types=1);

namespace App\Repository;

use App\Arango\AbstractArangoRepository;
use App\Entity\Sample;
use App\Entity\Source;
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

    public function countBySource(Source $source): int
    {
        $ret = $this->aql(
            <<<AQL
FOR edge in sample_from_source
    FILTER edge._to == @source
    COLLECT WITH COUNT INTO cnt
    RETURN cnt
AQL,
            ['source' => $source->getId()]
        );

        return $ret[0];
    }
}
