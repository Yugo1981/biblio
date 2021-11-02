<?php

namespace App\Controller;

use App\Entity\Location;
use App\Form\LocationType;
use App\Repository\LocationRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class LocationController extends AbstractController
{
    /**
     * @Route("/location", name="location")
     */
    public function index(LocationRepository $locationRepository): Response
    {
        return $this->render('location/index.html.twig', [
            'location' => $locationRepository->findAll(),
        ]);
    }
}
