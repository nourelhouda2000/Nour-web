<?php

namespace App\Controller;
use App\Form\ClassroomforType;
use App\Entity\Classroom;
use App\Repository\ClassroomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;





class ClassroomController extends AbstractController
{
    #[Route('/classroom', name: 'app_classroom')]
    public function index(): Response
    {
        return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
        ]);
    }

    #[Route('/AfficherC', name: 'AfficherC')]
    public function AfficherC(ClassroomRepository $repo): Response
    {
        $resul= $repo->findAll();
        return $this->render('classroom/List.html.twig', [
            'response' => $resul,
        ]);
    }

    #[Route('/AjouterC', name: 'add')]
    public function add(Request $request, ManagerRegistry $mr): Response
    {
        
        $classroom = new Classroom();
        $form = $this->createForm(ClassroomforType::class, $classroom);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        $em=$mr->getManager();
        $em->persist($classroom);
        $em->flush();
  
      
     return $this->redirectToRoute('fetch');
    }
    return $this->render('classroom/form.html.twig', [
        'form' => $form->createView(),
    ]);
    }


    
}