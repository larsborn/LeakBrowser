<?php declare(strict_types=1);

namespace App\Controller;

use App\Repository\SampleRepository;
use App\Repository\UsernameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/username')]
class UsernameController extends AbstractController
{
    private SampleRepository $sampleRepository;
    private UsernameRepository $usernameRepository;

    public function __construct(SampleRepository $sampleRepository, UsernameRepository $usernameRepository)
    {
        $this->sampleRepository = $sampleRepository;
        $this->usernameRepository = $usernameRepository;
    }

    #[Route('/{username}')]
    public function username(Request $request, string $username): Response
    {
        $usernameEntity = $this->usernameRepository->find($username);
        if ($usernameEntity === null) {
            throw new NotFoundHttpException();
        }

        $itemsPerPage = 10;
        $page = (int)$request->query->get('page', '0');
        $totalCount = $this->sampleRepository->countByUsername($usernameEntity);

        return $this->render(
            'Hostname/show.html.twig',
            [
                'hostname' => $usernameEntity,
                'samples' => $this->sampleRepository->findByUsername(
                    $usernameEntity,
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
