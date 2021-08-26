<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ImageRepository $imageRepository,Request $request): Response
    {
        $form=$this->createForm(Sea)
        $images=$imageRepository->findAll();
        return $this->render('home/index.html.twig', [
            'images' => $images,
        ]);
    }
}
