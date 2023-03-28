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
            InputHelper::nullableInt($document->get('crc32')),
            InputHelper::nullableString($document->get('md5')),
            InputHelper::nullableString($document->get('sha1')),
            InputHelper::nullableString($document->get('sha256')),
            InputHelper::nullableInt($document->get('size')),
            InputHelper::nullableString($document->get('file_magic')),
            InputHelper::nullableArray($document->get('file_names')),
            InputHelper::nullableArray($document->get('email')),
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

    public function findBySource(Source $source): array
    {
        $ret = [];
        foreach ($this->aql(
            <<<AQL
FOR edge in sample_from_source
    FILTER edge._to == @source
    RETURN edge._from
AQL,
            ['source' => $source->getId()]
        ) as $id) {
            $ret[] = $this->constructEntity($this->getDocumentHandler()->get($this->getCollectionName(), $id));
        }

        return $ret;
    }
}
