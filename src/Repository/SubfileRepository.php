<?php declare(strict_types=1);

namespace App\Repository;

use App\Arango\AbstractArangoRepository;
use App\Arango\ArangoDatabase;
use App\DTO\Path;
use App\DTO\Timestamp;
use App\Entity\Sample;
use App\Entity\Subfile;
use App\InputHelper;
use ArangoDBClient\Document;
use DateTimeImmutable;

/**
 * @template-extends AbstractArangoRepository<Subfile>
 */
class SubfileRepository extends AbstractArangoRepository
{
    private SampleRepository $sampleRepository;

    public function __construct(ArangoDatabase $arangoDatabase, SampleRepository $sampleRepository)
    {
        parent::__construct($arangoDatabase);
        $this->sampleRepository = $sampleRepository;
    }

    protected function getCollectionName(): string
    {
        return 'subfile';
    }

    protected function constructEntity(Document $document): Subfile
    {
        return new Subfile(
            $document->getId(),
            InputHelper::type(
                $this->sampleRepository->get(InputHelper::string($document->get('_from'))),
                Sample::class
            ),
            InputHelper::type(
                $this->sampleRepository->get(InputHelper::string($document->get('_to'))),
                Sample::class
            ),
            array_map(
                fn(array $path) => $this->constructPath($path),
                $document->get('paths')
            ),
        );
    }

    private function constructPath(array $path): Path
    {
        $timestamps = isset($path['timestamps']) ? InputHelper::array($path['timestamps']) : null;

        return new Path(
            isset($path['processor_name']) ? InputHelper::string($path['processor_name']) : null,
            isset($path['file_name']) ? InputHelper::string($path['file_name']) : null,
            isset($path['email_subject']) ? InputHelper::string($path['email_subject']) : null,
            isset($path['email_sender_name']) ? InputHelper::string($path['email_sender_name']) : null,
            $timestamps === null ? [] : array_map(
                fn(array $row) => new Timestamp(
                    new DateTimeImmutable($row['value']),
                    isset($row['description']) ? InputHelper::string($row['description']) : null,
                ),
                $timestamps
            ),
        );
    }

    /**
     * @return Subfile[]
     */
    public function findChildren(Sample $sample, int $limit = 10, int $offset = 0): array
    {
        return array_map(
            fn(Document $row) => $this->constructEntity($row),
            $this->aql(
                'FOR edge in subfile FILTER edge._from == @source LIMIT @offset, @limit RETURN edge',
                ['source' => $sample->getId(), 'limit' => $limit, 'offset' => $offset]
            )
        );
    }

    /**
     * @return Subfile[]
     */
    public function findParents(Sample $sample, int $limit = 10, int $offset = 0): array
    {
        return array_map(
            fn(Document $row) => $this->constructEntity($row),
            $this->aql(
                'FOR edge in subfile FILTER edge._to == @source LIMIT @offset, @limit RETURN edge',
                ['source' => $sample->getId(), 'limit' => $limit, 'offset' => $offset]
            )
        );
    }

    public function countChildren(Sample $sample): int
    {
        return $this->aql(
            'FOR edge in subfile FILTER edge._from == @source COLLECT WITH COUNT INTO length RETURN length',
            ['source' => $sample->getId()]
        )[0];
    }

    public function countParents(Sample $sample): int
    {
        return $this->aql(
            'FOR edge in subfile FILTER edge._to == @source COLLECT WITH COUNT INTO length RETURN length',
            ['source' => $sample->getId()]
        )[0];
    }
}
