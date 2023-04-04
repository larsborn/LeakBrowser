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
            InputHelper::nullableString($document->get('mime_type')),
            InputHelper::nullableString($document->get('file_extension')),
            InputHelper::nullableArray($document->get('file_names')),
            InputHelper::nullableArray($document->get('email')),
        );
    }

    public function countBySource(Source $source): int
    {
        $ret = $this->rawAql(
            <<<AQL
    FOR edge in sample_from_source
    FILTER edge._to == @source
    COLLECT WITH COUNT INTO cnt
    RETURN cnt
    AQL,
            ['source' => $source->getId()],
        );

        return $ret[0];
    }

    /**
     * @return Sample[]
     */
    public function findBySource(Source $source, int $limit = 10, int $offset = 0): array
    {
        $ret = [];
        foreach ($this->rawAql(
            <<<AQL
FOR edge in sample_from_source
    FILTER edge._to == @source
    LIMIT @offset, @limit
    RETURN edge._from
AQL,
            ['source' => $source->getId(), 'offset' => $offset, 'limit' => $limit],
        ) as $id) {
            $sample = $this->get($id);
            if ($sample) {
                $ret[] = $sample;
            }
        }

        return $ret;
    }

    public function countByWildcardString(string $query): int
    {
        return $this->rawAql(
            <<<AQL
FOR sample IN samples
    FILTER CONTAINS(sample.email.body, @query)
    COLLECT WITH COUNT INTO cnt
    RETURN cnt
AQL,
            ['query' => $query],
        )[0];
    }

    /**
     * @return Sample[]
     */
    public function findByWildcardString(string $query, int $limit = 10, int $offset = 0): array
    {
        return $this->aql(
            <<<AQL
FOR sample IN samples
    FILTER CONTAINS(sample.email.body, @query)
    SORT sample.sha256
    LIMIT @offset, @limit
    RETURN sample
AQL,
            ['query' => $query, 'limit' => $limit, 'offset' => $offset],
        );
    }

    /**
     * @return Sample[]
     */
    public function findByMagics(array $magics, int $limit = 10, int $offset = 0): array
    {
        return $this->aql(
            <<<AQL
FOR sample IN samples
    FILTER sample.file_magic IN @magics
    SORT sample.sha256
    LIMIT @offset, @limit
    RETURN sample
AQL,
            ['magics' => $magics, 'limit' => $limit, 'offset' => $offset]
        );
    }

    public function countByMagics(array $magics): int
    {
        return $this->rawAql(
            <<<AQL
FOR sample IN samples
    FILTER sample.file_magic IN @magics
    COLLECT WITH COUNT INTO cnt
    RETURN cnt
AQL,
            ['magics' => $magics],
        )[0];
    }
}
