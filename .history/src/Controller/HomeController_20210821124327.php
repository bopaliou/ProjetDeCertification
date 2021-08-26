<?php

namespace App\Controller;

use App\Form\SearchDocumentType;
use App\Repository\ImageRepository;
use App\Repository\DocumentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ImageRepository $imageRepository,Request $request): Response
    {
        $form=$this->createForm(SearchDocumentType::class);
        $search=$form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $images=$imageRepository->searchByType($search->get('term')->getData());
        }
      
        return $this->render('home/index.html.twig', [
            'images' => $images,
            'form'=>$form->createView()
        ]);
    }
}
