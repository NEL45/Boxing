<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\BoxeursType;
use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoxeursController extends AbstractController
{
    /**
     * @Route("/boxeurs", name="boxeurs")
     * @return Response
     */
    public function index(Request $request): Response
    {   
        $boxeurs = new Users();
        $form = $this->createForm(BoxeursType::class, $boxeurs);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($boxeurs);
            $entityManager->flush();

            return $this->redirectToRoute('accueil', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('boxeurs/index.html.twig', [
            'users' => $boxeurs,
            'form' => $form,
        ]);
        
    }
}
