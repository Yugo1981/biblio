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
    
    /**
     * Route ("/Default), name="bob")
     */
    public function bob () : Response {
        return New Response("Hello World"); 
    }

    // Manipuler l'objet Request

        // 1- Les paramètres de la requête
            // A - Les paramètres contenus dans les routes 

    
    /**
     * @Route("/actu/{id}", name="")     * 
     */

    public function voirActu ($id) : Response {
        return new Response(" Voici l'actualité de ".$id.".");
    }

    // REPONSE & VUE
    /**
     * @Route("/actu/{id}", name="index_affichage")
     */
    public function affichage($id)
    {
      // On utilise le raccourci : il crée un objet Response
      New Response;
      // Et lui donne comme contenu le contenu du template
      return $this->render('DefaultController/index.html.twig', array(
        'id'  => $id,
      ));
    }


}