<?php declare(strict_types=1);

namespace App\Controller;

use App\Repository\SampleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sample')]
class SampleController extends AbstractController
{
    private SampleRepository $sampleRepository;

    public function __construct(SampleRepository $sampleRepository)
    {
        $this->sampleRepository = $sampleRepository;
    }

    #[Route('/{sha256}')]
    public function sample(string $sha256): Response
    {
        $sample = $this->sampleRepository->get($sha256);

        return $this->render('Sample/show.html.twig', ['sample' => $sample]);
    }
}
