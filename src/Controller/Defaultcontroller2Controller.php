<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Defaultcontroller2Controller extends AbstractController
{
    /**
     * @Route("/defaultcontroller2", name="defaultcontroller2")
     */
    public function index(): Response
    {
        return $this->render('defaultcontroller2/index.html.twig', [
            'controller_name' => 'Defaultcontroller2Controller',
        ]);
    }
}
