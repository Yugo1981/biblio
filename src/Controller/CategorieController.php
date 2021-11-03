<?php

namespace App\Controller;


use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/categorie")
 */

class CategorieController extends AbstractController
{
    /**
     * @Route("/", name="categorie")
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('categorie/index.html.twig', [
            'categorie' => $categorieRepository->findAll(),
        ]);
    }

      /**
     * @Route("/{id}", name="categories_show", methods={"GET"})
     */
    public function show(Categorie $categorie): Response
    {
        return $this->render('categorie/affichage.html.twig', [
            'categorie' => $categorie,
        ]);
    }
}
