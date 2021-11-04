<?php

namespace App\Controller;


use App\Entity\Categorie;
use App\Repository\CategorieRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;


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
     * @Route("/new", name="categorie_new")
     */

    public function nouveau(Request $request, EntityManagerInterface $em) : Response
    {    
                $categorie = new Categorie();
            
                $categorie->setTitre(" Categorie ");
                $categorie->setResume(" Resume de la catégorie");
            $em->persist($categorie);            
        $em->flush();
        return $this->render('categorie/nouveau.html.twig', [
            'categorie' => $categorie,
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
