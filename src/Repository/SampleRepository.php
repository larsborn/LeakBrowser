<?php

declare(strict_types=1);

namespace App\Repository;

use App\Arango\AbstractArangoRepository;
use App\DTO\ExtensionWithCount;
use App\Entity\EmailAddress;
use App\Entity\Hostname;
use App\Entity\Sample;
use App\Entity\Source;
use App\Entity\Username;
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
            InputHelper::nullableArray($document->get('image')),
            InputHelper::nullableString($document->get('thumbnail')),
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
FOR sample IN email_search
    SEARCH ANALYZER(PHRASE(sample.email.subject, @query), "text_ru")
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
FOR sample IN email_search
    SEARCH ANALYZER(PHRASE(sample.email.subject, @query), "text_ru")
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

    /**
     * @return Sample[]
     */
    public function findByEmailAddress(EmailAddress $emailAddress, int $limit = 10, int $offset = 0): array
    {
        return array_map(
            fn (Document $document) => $this->constructEntity(
                $this->getDocumentHandler()->get($this->getCollectionName(), $document->get('_to'))
            ),
            $this->rawAql(
                'FOR edge in email_address_in_sample FILTER edge._from == @emailAddressId SORT edge._to LIMIT @offset, @limit RETURN edge',
                ['emailAddressId' => $emailAddress->getId(), 'limit' => $limit, 'offset' => $offset]
            )
        );
    }

    public function countByEmailAddress(EmailAddress $emailAddress): int
    {
        return $this->rawAql(
            'FOR edge in email_address_in_sample FILTER edge._from == @emailAddressId COLLECT WITH COUNT INTO cnt RETURN cnt',
            ['emailAddressId' => $emailAddress->getId()]
        )[0];
    }

    /**
     * @return Sample[]
     */
    public function findByHostname(Hostname $hostname, int $limit = 10, int $offset = 0): array
    {
        return array_map(
            fn (Document $document) => $this->constructEntity(
                $this->getDocumentHandler()->get($this->getCollectionName(), $document->get('_to'))
            ),
            $this->rawAql(
                'FOR edge in hostname_in_sample FILTER edge._from == @hostnameId SORT edge._to LIMIT @offset, @limit RETURN edge',
                ['hostnameId' => $hostname->getId(), 'limit' => $limit, 'offset' => $offset]
            )
        );
    }

    public function countByHostname(Hostname $hostname): int
    {
        return $this->rawAql(
            'FOR edge in hostname_in_sample FILTER edge._from == @hostnameId COLLECT WITH COUNT INTO cnt RETURN cnt',
            ['hostnameId' => $hostname->getId()]
        )[0];
    }

    /**
     * @return Sample[]
     */
    public function findByUsername(Username $username, int $limit = 10, int $offset = 0): array
    {
        return array_map(
            fn (Document $document) => $this->constructEntity(
                $this->getDocumentHandler()->get($this->getCollectionName(), $document->get('_to'))
            ),
            $this->rawAql(
                'FOR edge in username_in_sample FILTER edge._from == @usernameId SORT edge._to LIMIT @offset, @limit RETURN edge',
                ['usernameId' => $username->getId(), 'limit' => $limit, 'offset' => $offset]
            )
        );
    }

    public function countByUsername(Username $username): int
    {
        return $this->rawAql(
            'FOR edge in username_in_sample FILTER edge._from == @usernameId COLLECT WITH COUNT INTO cnt RETURN cnt',
            ['usernameId' => $username->getId()]
        )[0];
    }

    /**
     * @return ExtensionWithCount[]
     */
    public function findExtensions(): array
    {
        $ret = [];
        foreach ($this->rawAql(
            <<<AQL
FOR sample in samples
    FILTER sample.file_extension != null
    COLLECT extension = sample.file_extension WITH COUNT INTO cnt
    SORT cnt DESC
    RETURN {"extension": extension, "count": cnt}
AQL
        ) as $row) {
            $ret[] = new ExtensionWithCount(
                InputHelper::string($row->get('extension')),
                InputHelper::int($row->get('count')),
            );
        }

        return $ret;
    }
}
