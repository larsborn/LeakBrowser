<?php declare(strict_types=1);

namespace App\Controller;

use App\Repository\SampleRepository;
use App\Repository\SubfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sample')]
class SampleController extends AbstractController
{
    private SampleRepository $sampleRepository;
    private SubfileRepository $subfileRepository;

    public function __construct(SampleRepository $sampleRepository, SubfileRepository $subfileRepository)
    {
        $this->sampleRepository = $sampleRepository;
        $this->subfileRepository = $subfileRepository;
    }

    #[Route('/{sha256}')]
    public function sample(string $sha256): Response
    {
        $sample = $this->sampleRepository->get($sha256);

        return $this->render('Sample/show.html.twig', [
            'sample' => $sample,
            'children' => $this->subfileRepository->findChildren($sample),
            'parents' => $this->subfileRepository->findParents($sample),
        ]);
    }
}
