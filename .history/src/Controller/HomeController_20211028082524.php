<?php

namespace App\Controller;

use App\Entity\Image;
use App\Repository\ImageRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    #[Route('/document/{id}', name: 'detail_document',methods:)]
    public function show(Image $image): Response
    {
        return $this->render('home/index.html.twig', [
            'image' => $image,
        ]);
    }

   
   
}
