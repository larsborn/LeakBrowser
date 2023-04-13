<?php declare(strict_types=1);

namespace App\Controller;

use App\Repository\SampleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/types')]
class FileTypeController extends AbstractController
{
    private SampleRepository $sampleRepository;

    public function __construct(SampleRepository $sampleRepository)
    {
        $this->sampleRepository = $sampleRepository;
    }

    #[Route('/')]
    public function list(): Response
    {
        return $this->render('FileType/list.html.twig', [
            'extensions' => $this->sampleRepository->findExtensions(),
        ]);
    }
}
