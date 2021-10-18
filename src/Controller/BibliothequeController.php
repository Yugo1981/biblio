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
        return $this->render('/base.html.twig', [
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

    /**
     * @Route("/admin", name="admin_bibliotheque")
     */

    public function admin(): Response
    {
        return $this->render('bibliotheque/menu_admin.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/system", name="system_bibliotheque")
     */

    public function system(): Response
    {
        return $this->render('bibliotheque/system.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/utilisateurs", name="utilisateurs_bibliotheque")
     */

    public function utilisateur(): Response
    {
        return $this->render('bibliotheque/utilisateurs.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/contenu", name="contenu_bibliotheque")
     */

    public function contenu(): Response
    {
        return $this->render('bibliotheque/contenu.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/extenssion", name="extenssion_bibliotheque")
     */

    public function extenssion(): Response
    {
        return $this->render('bibliotheque/extenssion.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/logout", name="logout_bibliotheque")
     */

    public function logOut(): Response
    {
        return $this->render('bibliotheque/logout.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }
}
