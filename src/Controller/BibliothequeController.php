<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/biblio")
 */

class BibliothequeController extends AbstractController
{
    /**
     * @Route("/", name="index_biblio")
     */
    public function index(): Response
    {
        return $this->render('bibliotheque/index.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/apropos", name="apropos_biblio")
     */
    public function aPropos(): Response
    {
        return $this->render('bibliotheque/apropos.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/livre", name="livre_biblio")
     */

    public function livre(): Response
    {
        return $this->render('bibliotheque/livre.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/location", name="location_biblio")
     */

    public function location(): Response
    {
        return $this->render('bibliotheque/location.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/documentation", name="documentation_biblio")
     */

    public function documentation(): Response
    {
        return $this->render('bibliotheque/documentation.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/contacter", name="contacter_biblio")
     */

    public function nousContacter(): Response
    {
        return $this->render('bibliotheque/nous_contacter.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/connexion", name="connexion_biblio")
     */

    public function connecter(): Response
    {
        return $this->render('bibliotheque/connexion.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/administration", name="administration_biblio")
     */

    public function administration(): Response
    {
        return $this->render('bibliotheque/administration.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/admin", name="admin_biblio")
     */

    public function admin(): Response
    {
        return $this->render('bibliotheque/menu_admin.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/system", name="system_biblio")
     */

    public function system(): Response
    {
        return $this->render('bibliotheque/system.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/utilisateurs", name="utilisateurs_biblio")
     */

    public function utilisateur(): Response
    {
        return $this->render('bibliotheque/utilisateurs.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/contenu", name="contenu_biblio")
     */

    public function contenu(): Response
    {
        return $this->render('bibliotheque/contenu.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/extenssion", name="extenssion_biblio")
     */

    public function extenssion(): Response
    {
        return $this->render('bibliotheque/extenssion.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    /**
     * @Route("/logout", name="logout_biblio")
     */

    public function logOut(): Response
    {
        return $this->render('bibliotheque/logout.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }

    
    /**
     * @Route ("/afficher", name="afficher_biblio")
     */

    public function afficher($id) {
        return $this->render('BibliothequeController/afficher.html.twig', array(
            'id'  => $id,
        ));
    }
}
