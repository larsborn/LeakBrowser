<?php

declare(strict_types=1);

namespace App\Repository;

use App\Arango\AbstractArangoRepository;
use App\Entity\Sample;
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

    /**
     * @return Source[]
     */
    public function findBySample(Sample $sample): array
    {
        $ret = [];
        foreach ($this->rawAql(
            'FOR edge in sample_from_source FILTER edge._from == @sample RETURN edge._to',
            ['sample' => $sample->getId()],
        ) as $id) {
            $source = $this->get($id);
            if ($source) {
                $ret[] = $source;
            }
        }

        return $ret;
    }
}
