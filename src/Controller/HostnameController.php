<?php declare(strict_types=1);

namespace App\Controller;

use App\Repository\HostnameRepository;
use App\Repository\SampleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/hostname')]
class HostnameController extends AbstractController
{
    private HostnameRepository $hostnameRepository;
    private SampleRepository $sampleRepository;

    public function __construct(HostnameRepository $hostnameRepository, SampleRepository $sampleRepository)
    {
        $this->hostnameRepository = $hostnameRepository;
        $this->sampleRepository = $sampleRepository;
    }

    #[Route('/{hostname}')]
    public function hostname(Request $request, string $hostname): Response
    {
        $hostnameEntity = $this->hostnameRepository->find($hostname);
        if ($hostnameEntity === null) {
            throw new NotFoundHttpException();
        }

        $itemsPerPage = 10;
        $page = (int)$request->query->get('page', '0');
        $totalCount = $this->sampleRepository->countByHostname($hostnameEntity);

        return $this->render(
            'Hostname/show.html.twig',
            [
                'hostname' => $hostnameEntity,
                'samples' => $this->sampleRepository->findByHostname(
                    $hostnameEntity,
                    $itemsPerPage,
                    $page * $itemsPerPage
                ),
                'count' => $totalCount,
                'currentPage' => $page,
                'pageCount' => ceil($totalCount / $itemsPerPage),
            ]
        );
    }
}
