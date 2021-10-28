<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ImageRepository $imageRepository,Request $request): Response
    {
        $images=$imageRepository->findAll();
        if($request->isMethod('POST')){
            $type=$request->get('type');
            $images=$imageRepository->findBy(array('type'=>$ty));
        }
        return $this->render('home/index.html.twig', [
            'images' => $images,
        ]);
    }

   
   
}