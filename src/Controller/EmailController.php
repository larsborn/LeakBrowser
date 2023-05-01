<?php declare(strict_types=1);

namespace App\Controller;

use App\Repository\EmailAddressRepository;
use App\Repository\MagicRepository;
use App\Repository\SampleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/email')]
class EmailController extends AbstractController
{
    private SampleRepository $sampleRepository;
    private MagicRepository $magicRepository;
    private EmailAddressRepository $emailAddressRepository;

    public function __construct(
        SampleRepository $sampleRepository,
        MagicRepository $magicRepository,
        EmailAddressRepository $emailAddressRepository,
    ) {
        $this->sampleRepository = $sampleRepository;
        $this->magicRepository = $magicRepository;
        $this->emailAddressRepository = $emailAddressRepository;
    }

    #[Route('/list')]
    public function list(Request $request): Response
    {
        $itemsPerPage = 10;
        $page = (int)$request->query->get('page', '0');
        $totalCount = $this->sampleRepository->countByMagics($this->magicRepository->emails());

        return $this->render(
            'Email\list.html.twig',
            [
                'samples' => $this->sampleRepository->findByMagics(
                    $this->magicRepository->emails(),
                    $itemsPerPage,
                    $page * $itemsPerPage
                ),
                'currentPage' => $page,
                'pageCount' => ceil($totalCount / $itemsPerPage),
            ]
        );
    }

    #[Route('/by-month')]
    public function byMonth(): Response
    {
        return $this->render('Email/by-month.html.twig', [
            'emails_by_month' => $this->sampleRepository->groupEmailByMonth(),
        ]);
    }

    #[Route('/address/{emailAddress}')]
    public function showAddress(Request $request, string $emailAddress): Response
    {
        $emailAddressEntity = $this->emailAddressRepository->find($emailAddress);
        if ($emailAddressEntity === null) {
            throw new NotFoundHttpException();
        }

        $itemsPerPage = 10;
        $page = (int)$request->query->get('page', '0');
        $totalCount = $this->sampleRepository->countByEmailAddress($emailAddressEntity);

        return $this->render(
            'email/address.html.twig',
            [
                'emailAddress' => $emailAddressEntity,
                'samples' => $this->sampleRepository->findByEmailAddress(
                    $emailAddressEntity,
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
