<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailDocumentController extends AbstractController
{
    #[Route('/document/{id}', name: 'detail_document')]
    public function index(Image): Response
    {
        return $this->render('detail_document/index.html.twig', [
            'controller_name' => 'DetailDocumentController',
        ]);
    }
}
