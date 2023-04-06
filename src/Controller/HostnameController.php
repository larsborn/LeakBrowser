<?php declare(strict_types=1);

namespace App\Controller;

use App\Repository\HostnameRepository;
use App\Repository\SampleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
        $hostname = $this->hostnameRepository->find($hostname);

        $itemsPerPage = 10;
        $page = (int)$request->query->get('page', '0');
        $totalCount = $this->sampleRepository->countByHostname($hostname);

        return $this->render(
            'Hostname/show.html.twig',
            [
                'hostname' => $hostname,
                'samples' => $this->sampleRepository->findByHostname(
                    $hostname,
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
