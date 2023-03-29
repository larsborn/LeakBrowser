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
class SearchController extends AbstractController
{
    private SearchService $searchService;
    private SampleRepository $sampleRepository;

    public function __construct(SearchService $searchService, SampleRepository $sampleRepository)
    {
        $this->searchService = $searchService;
        $this->sampleRepository = $sampleRepository;
    }

    #[Route('/form')]
    public function form(Request $request): Response
    {
        $dto = new GlobalSearchDTO();
        $form = $this->createForm(GlobalSearchType::class, $dto, [
            'action' => $this->generateUrl('app_search_form'),
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

            return $this->redirect($this->generateUrl('app_search_results', ['query' => $dto->term]));
        }

        return $this->render('Search/form.html.twig', ['form' => $form->createView()]);
    }

    #[Route('/results')]
    public function results(Request $request): Response
    {
        $query = $request->get('query');

        $itemsPerPage = 10;
        $page = (int)$request->query->get('page', 0);
        $totalCount = $this->sampleRepository->countByWildcardString($query);

        return $this->render('Search/results.html.twig', [
            'query' => $query,
            'samples' => $this->sampleRepository->findByWildcardString($query, $itemsPerPage, $page * $itemsPerPage),
            'currentPage' => $page,
            'pageCount' => ceil($totalCount / $itemsPerPage),
        ]);
    }
}
