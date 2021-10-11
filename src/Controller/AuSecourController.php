<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuSecourController extends AbstractController
{
    /**
     * @Route("/au/secour", name="au_secour")
     */
    public function index(): Response
    {
        return $this->render('au_secour/index.html.twig', [
            'controller_name' => 'AuSecourController',
        ]);
    }

      // REDIRECTION
    // return $this->redirectToRoute('home');
    
    /**
     * @Route("/voir", name="voir")
     */

    // /**
    //  * @Route("/voir", name="index_redir")
    //  */

    public function redirection()
    {
        return $this->redirectToRoute('apropos');
    }
}
