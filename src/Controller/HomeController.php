<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\MagicRepository;
use App\Repository\SampleRepository;
use App\Repository\SourceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private SourceRepository $sourceRepository;
    private SampleRepository $sampleRepository;
    private MagicRepository $magicRepository;

    public function __construct(
        SourceRepository $sourceRepository,
        SampleRepository $sampleRepository,
        MagicRepository $magicRepository
    ) {
        $this->sourceRepository = $sourceRepository;
        $this->sampleRepository = $sampleRepository;
        $this->magicRepository = $magicRepository;
    }

    #[Route('/')]
    public function home(): Response
    {
        return $this->render('home.html.twig', [
            'sourceCount' => $this->sourceRepository->countAll(),
            'sampleCount' => $this->sampleRepository->countAll(),
            'emailCount' => $this->sampleRepository->countByMagics($this->magicRepository->emails()),
        ]);
    }
}
