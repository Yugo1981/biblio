<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

Class DefaultController extends AbstractController 
{
    /**
     * Route ("/Default"), name="Default")
     */
    public function  index () : Response {
        return $this->render('DefaultController/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    } 
}