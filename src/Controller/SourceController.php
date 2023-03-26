<?php declare(strict_types=1);

namespace App\Controller;

use App\DTO\SourceWithCount;
use App\Repository\SampleRepository;
use App\Repository\SourceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/source')]
class SourceController extends AbstractController
{
    private SourceRepository $sourceRepository;
    private SampleRepository $sampleRepository;

    public function __construct(SourceRepository $sourceRepository, SampleRepository $sampleRepository)
    {
        $this->sourceRepository = $sourceRepository;
        $this->sampleRepository = $sampleRepository;
    }

    #[Route('/')]
    public function list(): Response
    {
        $sources = [];
        foreach ($this->sourceRepository->findAll() as $source) {
            $sources[] = new SourceWithCount(
                $source,
                $this->sampleRepository->countBySource($source),
            );
        }

        return $this->render('Source/list.html.twig', ['sources' => $sources]);
    }
    #[Route('/{sourceId}')]
    public function show(string $sourceId): Response
    {
        $source = $this->sourceRepository->get(sprintf('sources/%s', $sourceId));
        if ($source === null) {
            throw new NotFoundHttpException(sprintf('source with id suffix "%s" not found', $sourceId));
        }

        return $this->render('Source/show.html.twig', [
            'source' => $source,
            'samples' => $this->sampleRepository->findBySource($source),
        ]);
    }
}
