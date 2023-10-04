<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    #[Route('/list', name: 'app_list')]
    public function index(): Response
    {
        return $this->render('list/index.html.twig', [
            'controller_name' => 'ListController',
        ]);
    }

    #[Route('/list1', name: 'list')]
    public function list(): Response
    {
        $authors = array(
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
            'victor.hugo@gmail.com ', 'nb_books' => 0),
            array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
            ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
            'taha.hussein@gmail.com', 'nb_books' => 300),
            );
        return $this->render('service/list.html.twig',[
        'tab'=>$authors
        ]);


    }

    #[Route('/list/{id}', name: 'list_details')]
    public function authorDetails($id): Response
    {
        // Logique pour récupérer les détails de l'auteur en fonction de l'ID
        // Exemple : récupération de l'auteur avec l'ID correspondant depuis la base de données
        $author = $this->getDoctrine()->getRepository(Author::class)->find($id);

        // Vérifiez si l'auteur existe
        if (!$author) {
            // Gérez le cas où l'auteur n'est pas trouvé (par exemple, affichez un message d'erreur)
            return $this->render('service/error.html.twig', [
                'message' => 'Auteur non trouvé'
            ]);
        }

        return $this->render('service/details.html.twig', [
            'author' => $author,
        ]);
    }
}
