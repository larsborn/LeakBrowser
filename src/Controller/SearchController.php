<?php declare(strict_types=1);

namespace App\Controller;

use App\DTO\GlobalSearch as GlobalSearchDTO;
use App\Entity\Sample;
use App\Form\GlobalSearchType;
use App\Repository\SampleRepository;
use App\Search\Configuration;
use App\Search\Field;
use App\Search\FieldType\IntegerType;
use App\Search\FieldType\StringArrayType;
use App\Search\FieldType\StringFieldInArrayType;
use App\Search\FieldType\StringType;
use App\Search\SearchHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/search')]
class SearchController extends AbstractController
{
    private SearchHandler $searchHandler;
    private SampleRepository $sampleRepository;

    public function __construct(SearchHandler $searchHandler, SampleRepository $sampleRepository)
    {
        $this->searchHandler = $searchHandler;
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
            if ($this->searchHandler->isSha256($dto->term)) {
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
        $itemsPerPage = 10;
        $query = $request->query->get('query');
        $page = (int)$request->query->get('page', '0');
        $totalCount = $query ? $this->sampleRepository->countByWildcardString($query) : 0;
        $samples = $query ? $this->sampleRepository->findByWildcardString(
            $query,
            $itemsPerPage,
            $page * $itemsPerPage
        ) : [];

        return $this->render('Search/results.html.twig', [
            'query' => $query ? sprintf('"%s"', $query) : '-',
            'samples' => array_filter($samples, fn (Sample $sample) => ! $sample->isMail()),
            'email_samples' => array_filter($samples, fn (Sample $sample) => $sample->isMail()),
            'currentPage' => $page,
            'pageCount' => ceil($totalCount / $itemsPerPage),
        ]);
    }

    #[Route('/filter')]
    public function filter(Request $request): Response
    {
        $configuration = new Configuration([
            new Field('size', new IntegerType()),
            new Field('mime_type', new StringType()),
            new Field('file_extension', new StringType()),
            new Field('crc32', new IntegerType()),
            new Field('email.from_names', new StringArrayType()),
            new Field('email.from', new StringArrayType()),
            new Field('email.thread_index', new StringType()),
            new Field('email.message_uuid', new StringType()),
            new Field('email.list_uuid', new StringType()),
            new Field('email.content_uuid', new StringType()),
            new Field('file_names', new StringArrayType()),
            new Field('email.references', new StringFieldInArrayType('uuid')),
        ]);
        $searchResponse = $this->searchHandler->handle($configuration, $request);

        $samples = $searchResponse->getData();

        return $this->render('Search/results.html.twig', [
            'total' => $searchResponse->getTotal(),
            'query' => $searchResponse->getHumanReadableQuery(),
            'samples' => array_filter($samples, fn (Sample $sample) => ! $sample->isMail()),
            'email_samples' => array_filter($samples, fn (Sample $sample) => $sample->isMail()),
            'currentPage' => $searchResponse->getPage(),
            'pageCount' => $searchResponse->getPageCount(),
        ]);
    }
}
