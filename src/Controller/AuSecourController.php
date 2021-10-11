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
}
