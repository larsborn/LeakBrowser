<?php declare(strict_types=1);

namespace App\Controller;

use App\Repository\SampleRepository;
use App\Repository\SourceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/leak')]
class LeakController extends AbstractController
{
    private SourceRepository $sourceRepository;
    private SampleRepository $sampleRepository;

    public function __construct(SourceRepository $sourceRepository, SampleRepository $sampleRepository)
    {
        $this->sourceRepository = $sourceRepository;
        $this->sampleRepository = $sampleRepository;
    }

    #[Route('/{sourceId}')]
    public function bySource(string $sourceId): Response
    {
        $source = $this->sourceRepository->get(sprintf('sources/%s', $sourceId));
        if ($source === null) {
            throw new NotFoundHttpException(sprintf('source with id suffix "%s" not found', $sourceId));
        }

        return $this->render('source.html.twig', [
            'source' => $source,
            'samples' => $this->sampleRepository->findBySource($source),
        ]);
    }
}
