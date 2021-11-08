<?php

namespace App\Controller;

use App\Entity\Location;
use App\Form\LocationType;
use App\Repository\LocationRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/location")
 */

class LocationController extends AbstractController
{
     /**
     * @Route("/newform" , name="location_newform" , methods={"GET" , "POST"})
     */

    public function newformtype(Request $request) : Response
    {
        $locassion = New Location();
        $form = $this->createForm(LocationType::class, $locassion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($locassion);
            $entityManager->flush();

            return $this->redirectToRoute('location_index');
        }
        
        return $this->render('location/new3.html.twig' , [
            'locassion' => $locassion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/", name="location_index")
     */
    public function index(LocationRepository $locationRepository): Response
    {
        return $this->render('location/index.html.twig', [
            'location' => $locationRepository->findAll(),
        ]);
    }

     /**
     * @Route("/new", name="location_new")
    */
    public function nouveau(Request $request, EntityManagerInterface $em) : Response
    {    
                $location = new Location();
            
                $location->setTitre(" Titre de la location");
                $location->setDate(new \DateTime());
                $location->setCategorie(" Contenu de la catégorie location");
                $location->setImage(" Resume de la location");
                $location->setDescription(" Description de la location");
                $location->setValeur(" 5");
                $location->setAdresse(" Adresse de la location");
                $location->setAccessibility(" Aucune inspiration");
                $location->setStatus(" En attente");
                $location->setALaUne(" Au secours !!!!!!!!!!");
            $em->persist($location);            
        $em->flush();
        return $this->render('location/nouveau.html.twig', [
            'location' => $location,
        ]);
    }

    /**
     * @Route("/{id}", name="location_show", methods={"GET"})
     */
    public function show(Location $location): Response
    {
        return $this->render('location/affichage.html.twig', [
            'id'=>$location->getId(),
            'location' => $location,
        ]);
    }
}
