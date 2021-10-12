<?php

namespace App\Controller;

use Doctrine\DBAL\Abstraction\Result;
use PhpParser\Node\Expr\New_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

 /**
     * @Route("/view")
     */

class ViewController extends AbstractController {
    /**
     * @Route("/default", name="view")
     */

    public function index() : Response {
        return $this->render('ViewController/index.html.twig', [
            'controller_name' => 'ViewController',
        ]);        
    }

    /**
     * @Route ("/docu", name="view_docu")
     */

    public function afficher($id) {
        return $this->render('ViewController/docu.html.twig', array(
            'id'  => $id,
        ));
    }

     /**
     * @Route("/tableau", name="view_tab")
     */
    public function tables(): Response
    {
        // J'initialise mon tableau   
        $tab = [10, 15, 18];

        // J'appelle la vue TABLEAUX/TWIG
        return $this->render('ViewController/tableau.html.twig', [
        
        // J'affiche Mon tableau
    
        'cours_name' => 'COMPOSANTE VUE',
        'tableau' => $tab,
        ]);
        }

    /**
     * @Route("/afficher", name="afficher")
     */

     public function affichage() : Response {

        $nom = 'Follereau';
        $prenom = 'Fabrice';

        return $this->render('ViewController/affichage.html.twig', array(
            'nom'  => $nom, 
            'prenom' => $prenom,
          ));
     }

    /**
     * @Route ("/afficherliste", name="afficherliste")
     */
    
    public function afficherliste () : Response {
        $nom = ['Follereau','Lopez','Nwhela','Traore','Ndao','Khassaonew','Thuet','Planiteye','Nabi'];
        $prenom = ['Fabrice','Rudy','Valery','Bandjougou','Modou','Moath','Matthieu','Ange','Nabi'];

        return $this->render('ViewController/afficherliste.html.twig', array(
            'nom'  => $nom, 
            'prenom' => $prenom,
        ));
    }

    /**
     * @Route("/origine", name="origine")
     */
    public function origine() : Response {
        return $this->render('ViewController/origine.html.twig', [
            'controller_name' => 'ViewController'
        ]);
    }
}
