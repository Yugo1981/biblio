<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bibliotheque")
 */

class BibliothequeController extends AbstractController
{
    /**
     * @Route("/", name="index_bibliotheque")
     */
    public function index(): Response
    {
        return $this->render('bibliotheque/index.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/apropos", name="apropos_bibliotheque")
     */
    public function aPropos(): Response
    {
        return $this->render('bibliotheque/apropos.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/livre", name="livre_bibliotheque")
     */

    public function livre(): Response
    {
        return $this->render('bibliotheque/livre.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/location", name="location_bibliotheque")
     */

    public function location(): Response
    {
        return $this->render('bibliotheque/location.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

     /**
     * @Route("/documentation", name="documentation_bibliotheque")
     */

    public function documentation(): Response
    {
        return $this->render('bibliotheque/documentation.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

     /**
     * @Route("/contacter", name="contacter_bibliotheque")
     */

    public function nousContacter(): Response
    {
        return $this->render('bibliotheque/nous_contacter.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

     /**
     * @Route("/connexion", name="connexion_bibliotheque")
     */

    public function connecter(): Response
    {
        return $this->render('bibliotheque/connexion.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

     /**
     * @Route("/administration", name="administration_bibliotheque")
     */

    public function administration(): Response
    {
        return $this->render('bibliotheque/administration.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }
    
}
