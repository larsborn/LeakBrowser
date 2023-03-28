<?php declare(strict_types=1);

namespace App\Controller;

use App\DTO\GlobalSearch as GlobalSearchDTO;
use App\Form\GlobalSearchType;
use App\Repository\SampleRepository;
use App\Service\SearchService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/search')]
class GlobalSearchController extends AbstractController
{
    private SearchService $searchService;
    private SampleRepository $sampleRepository;

    public function __construct(SearchService $searchService, SampleRepository $sampleRepository)
    {
        $this->searchService = $searchService;
        $this->sampleRepository = $sampleRepository;
    }

    #[Route('/results')]
    public function form(Request $request): Response
    {
        $dto = new GlobalSearchDTO();
        $form = $this->createForm(GlobalSearchType::class, $dto, [
            'action' => $this->generateUrl('app_globalsearch_form'),
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($this->searchService->isSha256($dto->term)) {
                $sample = $this->sampleRepository->get($dto->term);
                if ($sample !== null) {
                    return $this->redirect(
                        $this->generateUrl('app_sample_metadata', ['sha256' => $sample->getSha256()])
                    );
                }
            }
            // TODO execute search in leak names for example
        }

        return $this->render('Global/search.html.twig', ['form' => $form->createView()]);
    }
}
