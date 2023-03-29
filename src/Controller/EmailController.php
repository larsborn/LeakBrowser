<?php declare(strict_types=1);

namespace App\Controller;

use App\Repository\SampleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/emails')]
class EmailController extends AbstractController
{
    private SampleRepository $sampleRepository;

    public function __construct(SampleRepository $sampleRepository)
    {
        $this->sampleRepository = $sampleRepository;
    }

    #[Route('/stats')]
    public function stats(Request $request): Response
    {
        $emailMagics = [
            'SMTP mail, ASCII text, with CRLF line terminators',
            'SMTP mail, ASCII text, with CRLF, CR line terminators',
            'SMTP mail, ASCII text, with very long lines, with CRLF line terminators',
            'SMTP mail, ASCII text, with very long lines, with CRLF, CR line terminators',
            'SMTP mail, ISO-8859 text, with CRLF line terminators',
            'SMTP mail, ISO-8859 text, with very long lines, with CRLF line terminators',
            'SMTP mail, Non-ISO extended-ASCII text, with CRLF line terminators',
            'SMTP mail, UTF-8 Unicode text, with CRLF line terminators',
            'SMTP mail, UTF-8 Unicode text, with very long lines, with CRLF line terminators',
            'news or mail, ASCII text, with CRLF line terminators',
            'news or mail, ASCII text, with CRLF line terminators, with escape sequences',
            'news or mail, ASCII text, with CRLF, CR line terminators',
            'news or mail, ASCII text, with very long lines, with CRLF line terminators',
            'news or mail, ASCII text, with very long lines, with CRLF line terminators, with escape sequences',
            'news or mail, ASCII text, with very long lines, with CRLF, CR line terminators',
            'news or mail, ISO-8859 text, with CRLF line terminators',
            'news or mail, ISO-8859 text, with CRLF, CR line terminators',
            'news or mail, UTF-8 Unicode text, with CRLF line terminators',
            'news or mail, UTF-8 Unicode text, with very long lines, with CRLF line terminators',
            'news or mail, UTF-8 Unicode text, with very long lines, with CRLF, LF line terminators',
            'RFC 822 mail, ASCII text, with CRLF line terminators',
            'RFC 822 mail, ASCII text, with CRLF, CR line terminators',
            'RFC 822 mail, ASCII text, with very long lines, with CRLF line terminators',
            'RFC 822 mail, ASCII text, with very long lines, with CRLF, CR line terminators',
            'RFC 822 mail, ISO-8859 text, with CRLF line terminators',
            'RFC 822 mail, UTF-8 Unicode text, with CRLF line terminators',
            'RFC 822 mail, UTF-8 Unicode text, with CRLF, CR line terminators',
            'RFC 822 mail, UTF-8 Unicode text, with very long lines, with CRLF line terminators',
        ];

        $itemsPerPage = 10;
        $page = (int)$request->query->get('page', 0);
        $totalCount = $this->sampleRepository->countByMagics($emailMagics);

        return $this->render(
            'Email/stats.html.twig', [
                'samples' => $this->sampleRepository->findByMagics($emailMagics, $itemsPerPage, $page * $itemsPerPage),
                'currentPage' => $page,
                'pageCount' => ceil($totalCount / $itemsPerPage),
            ]
        );
    }
}
