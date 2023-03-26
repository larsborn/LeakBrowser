<?php declare(strict_types=1);

namespace App\Repository;

use App\Arango\AbstractArangoRepository;
use App\Arango\ArangoDatabase;
use App\Entity\Sample;
use App\Entity\Subfile;
use ArangoDBClient\Document;

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

    protected function constructEntity(Document $document): object
    {
        return new Subfile(
            $document->getId(),
            $this->sampleRepository->get($document->get('_from')),
            $this->sampleRepository->get($document->get('_to')),
            $document->get('paths'),
        );
    }

    /**
     * @return Subfile[]
     */
    public function findChildren(Sample $sample): array
    {
        return array_map(
            fn(Document $row) => $this->constructEntity($row),
            $this->aql(
                'FOR edge in subfile FILTER edge._from == @source RETURN edge',
                ['source' => $sample->getId()]
            )
        );
    }

    /**
     * @return Subfile[]
     */
    public function findParents(Sample $sample): array
    {
        return array_map(
            fn(Document $row) => $this->constructEntity($row),
            $this->aql(
                'FOR edge in subfile FILTER edge._to == @source RETURN edge',
                ['source' => $sample->getId()]
            )
        );
    }
}
