<?php declare(strict_types=1);

namespace App\Controller;

use App\DTO\GlobalSearch as GlobalSearchDTO;
use App\DTO\SearchRequest;
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
    private Configuration $configuration;

    public function __construct(SearchHandler $searchHandler, SampleRepository $sampleRepository)
    {
        $this->searchHandler = $searchHandler;
        $this->sampleRepository = $sampleRepository;
        $this->configuration = new Configuration([
            new Field('size', new IntegerType(), true, false),
            new Field('mime_type', new StringType(), true, false),
            new Field('file_extension', new StringType(), true, false),
            new Field('crc32', new IntegerType(), true, false),
            new Field('email.from_names', new StringArrayType(), true, false),
            new Field('email.from', new StringArrayType(), true, false),
            new Field('email.thread_index', new StringType(), true, false),
            new Field('email.message_uuid', new StringType(), true, true),
            new Field('email.list_uuid', new StringType(), true, false),
            new Field('email.content_uuid', new StringType(), true, false),
            new Field('file_names', new StringArrayType(), true, false),
            new Field('email.references', new StringFieldInArrayType('uuid'), true, false),
            new Field('email.date_month', new StringType(), true, false),
        ], 'fieldsExist');
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
                        $sample->isMail() ?
                            $this->generateUrl('app_sample_email', ['sha256' => $sample->getSha256()]) :
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
        $searchResponse = $this->searchHandler->handle(SearchRequest::fromRequest($this->configuration, $request));

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

    #[Route('/field-exists')]
    public function fieldExists(Request $request): Response
    {
        $searchRequest = SearchRequest::fromRequest($this->configuration, $request);
        $searchResponse = $this->searchHandler->handle($searchRequest);
        return $this->render('Search/field-results.html.twig', [
            'total' => $searchResponse->getTotal(),
            'query' => $searchResponse->getHumanReadableQuery(),
            'currentPage' => $searchResponse->getPage(),
            'pageCount' => $searchResponse->getPageCount(),
            'samples' => $searchResponse->getData(),
            'fields' => $searchRequest->fieldsExist,
        ]);
    }
}
