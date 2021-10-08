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
     * @Route("/voirActu/{id}", name="")     * 
     */

    public function voirActu ($id) : Response {
        return new Response(" Voici l'actualité de $id");
    }

    // REPONSE & VUE
    /**
     * @Route("/article/{id}", name="index_affichage")
     */
    public function affichage($id)
    {
      // On utilise le raccourci : il crée un objet Response
      // Et lui donne comme contenu le contenu du template
      return $this->render('DefaultController/affichage.html.twig', array(
        'id'  => $id,
      ));
    }

      // REDIRECTION
    // return $this->redirectToRoute('home');
    /**
     * @Route("/redirect/{id}", name="index_redir")
     */
    public function redirection($id)
    {
        return $this->redirectToRoute('home');
    }




}