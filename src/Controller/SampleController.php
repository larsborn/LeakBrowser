<?php declare(strict_types=1);

namespace App\Controller;

use App\Repository\SampleRepository;
use App\Repository\SubfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
    public function metadata(string $sha256): Response
    {
        $sample = $this->sampleRepository->get($sha256);
        if ($sample === null) {
            throw new NotFoundHttpException();
        }

        return $this->render('Sample/metadata.html.twig', [
            'sample' => $sample,
            'childrenCount' => $this->subfileRepository->countChildren($sample),
            'parentsCount' => $this->subfileRepository->countParents($sample),
        ]);
    }

    #[Route('/{sha256}/children')]
    public function children(string $sha256): Response
    {
        $sample = $this->sampleRepository->get($sha256);
        if ($sample === null) {
            throw new NotFoundHttpException();
        }

        return $this->render('Sample/children.html.twig', [
            'sample' => $sample,
            'childrenCount' => $this->subfileRepository->countChildren($sample),
            'parentsCount' => $this->subfileRepository->countParents($sample),
            'samples' => $this->subfileRepository->findChildren($sample),
        ]);
    }

    #[Route('/{sha256}/parents')]
    public function parents(string $sha256): Response
    {
        $sample = $this->sampleRepository->get($sha256);
        if ($sample === null) {
            throw new NotFoundHttpException();
        }

        return $this->render('Sample/parents.html.twig', [
            'sample' => $sample,
            'childrenCount' => $this->subfileRepository->countChildren($sample),
            'parentsCount' => $this->subfileRepository->countParents($sample),
            'samples' => $this->subfileRepository->findParents($sample),
        ]);
    }

    #[Route('/{sha256}/email')]
    public function email(string $sha256): Response
    {
        $sample = $this->sampleRepository->get($sha256);
        if ($sample === null) {
            throw new NotFoundHttpException();
        }

        return $this->render('Sample/email.html.twig', [
            'sample' => $sample,
            'childrenCount' => $this->subfileRepository->countChildren($sample),
            'parentsCount' => $this->subfileRepository->countParents($sample),
        ]);
    }
}
