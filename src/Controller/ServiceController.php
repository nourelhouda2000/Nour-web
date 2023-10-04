<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(): Response
    {
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
        ]);
    }

    #[Route('/showService/{name}', name: 'showService')]
    public function showService($name): Response
    {
        return $this->render('service/showService.html.twig', [
            'name'=>$name,
        ]);
          
    }

    #[Route('/details', name: 'd')]
    public function d(): Response
    {
        return $this->render('home/index.html.twig');
          
    }

    #[Route('/service/go-to-index', name: 'service_go_to_index')]
    
    public function goToIndex(): RedirectResponse
    {
        
        return $this->redirectToRoute('app_home');
    }

    #[Route('/msg/{name}', name: 'msg')]
    
    public function msg($name): Response
    {
        $authors = array(
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
            'victor.hugo@gmail.com ', 'nb_books' => 0),
            array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
            ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
            'taha.hussein@gmail.com', 'nb_books' => 300),
            );
        return $this->render('service/index.html.twig',[
            'n'=>$name,'tab'=>$authors
        ]);


    }
}
