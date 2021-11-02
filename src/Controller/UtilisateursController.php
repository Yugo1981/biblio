<?php

namespace App\Controller;

use App\Entity\Utilisateurs;

use App\Repository\UtilisateursRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
  * @Route("/users")
*/
class UtilisateursController extends AbstractController
{
    /**
     * @Route("/", name="users_index")
     */
    public function index(UtilisateursRepository $utilisateursRepository): Response
    {
        return $this->render('utilisateurs/index.html.twig', [
            'utilisateurs' => $utilisateursRepository->findAll(),
        ]);
    }    

}
