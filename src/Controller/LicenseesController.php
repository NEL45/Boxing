<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use App\Controller\Licensees;
use App\Form\UsersType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/licencies")
 */
class LicenseesController extends AbstractController
{
    /**
     * @Route("/", name="licensees", methods={"GET"})
    * @return Response
    */
    public function index(UsersRepository $usersRepository): Response
    {
        return $this->render('licencies/index.html.twig', [
            'users' => $usersRepository->findBy([], ['name' => 'DESC']),
        ]);
    }
}