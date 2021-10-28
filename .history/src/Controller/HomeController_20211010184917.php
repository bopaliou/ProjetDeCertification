<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ImageRepository $imageRepository): Response
    {
        $images=$imageRepository->findAll();
        return $this->render('home/index.html.twig', [
            'images' => $images,
        ]);
    }

   
    #[Route('/search', name: 'search')]
    public function searchbyType(): Response
    {
        return $this->render('home.html.twig', []);
    }
}
