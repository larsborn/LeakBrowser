<?php declare(strict_types=1);

namespace App\Controller;

use App\Repository\SampleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/thumbnail')]
class ThumbnailController extends AbstractController
{
    private SampleRepository $sampleRepository;

    public function __construct(SampleRepository $sampleRepository)
    {
        $this->sampleRepository = $sampleRepository;
    }

    #[Route('/{sha256}')]
    public function thumbnail(string $sha256): Response
    {
        $sample = $this->sampleRepository->get($sha256);
        if ($sample === null) {
            throw new NotFoundHttpException();
        }
        $response = new Response();
        $disposition = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_INLINE,
            sprintf('%s.png', $sha256)
        );
        $response->headers->set('Content-Disposition', $disposition);
        $response->headers->set('Content-Type', 'image/png');
        $thumbnail = $sample->getThumbnail();
        if ($thumbnail === null) {
            throw new NotFoundHttpException();
        }
        $response->setContent(gzuncompress(base64_decode($thumbnail)));

        return $response;
    }
}
