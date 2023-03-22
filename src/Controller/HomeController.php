<?php declare(strict_types=1);

namespace App\Controller;

use App\Repository\SourceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/')]
    public function home(SourceRepository $sourceRepository): Response
    {
        return $this->render('home.html.twig', ['sources' => $sourceRepository->findAll()]);
    }
}
