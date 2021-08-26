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
    public function index(DocumentRepository $documentRepository,ImageRepository $imageRepository,Request $request): Response
    {
        $images=$imageRepository->findAll();
        $form=$this->createForm(SearchDocumentType::class);
        $search=$form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $documents=$documentRepository->findByType($search->get('document')->getData());
        }
      
        return $this->render('home/index.html.twig', [
            'images' => $images,
            'documents'=> $documents,
            'form'=>$form->createView()
        ]);
    }
}
