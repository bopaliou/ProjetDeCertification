<?php

namespace App\Controller;

use App\Entity\Image;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DetailDocumentController extends AbstractController
{
    #[Route('/document/{id}', name: 'detail_document')]
    public function index(Image $image): Response
    {
        return $this->render('detail_document/index.html.twig', [
            Image => $image,
        ]);
    }
}
