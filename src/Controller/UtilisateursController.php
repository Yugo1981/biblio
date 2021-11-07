<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use App\Repository\UtilisateursRepository;
use App\Form\UtilisateursType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Faker;

/**
 * @Route("/users")
 */
class UtilisateursController extends AbstractController
{

    /**
     * @Route("/newform" , name="newform" , methods={"GET" , "POST"})
     */

    public function newformtype(Request $request) : Response
    {
        $utilisator = New Utilisateurs();
        $form = $this->createForm(UtilisateursType::class, $utilisator);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($utilisator);
            $entityManager->flush();

            return $this->redirectToRoute('users_index');
        }
        
        return $this->render('utilisateurs/new3.html.twig' , [
            'utilisator' => $utilisator,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/", name="users_index")
     */
    public function index(UtilisateursRepository $utilisateursRepository): Response
    {
        return $this->render('utilisateurs/index.html.twig', [
            'utilisateurs' => $utilisateursRepository->findAll(),
        ]);
    }

     /**
     * @Route("/new", name="utilisateur_new")
    */
    public function nouveau(Request $request, EntityManagerInterface $em) : Response
    {    
        $faker = Faker\Factory::create('fr_FR');

                $utilisateurs = new Utilisateurs();
                $nom = ["Follereau","Nwelha","Planiteye","Palakot","Nabi","Khassaowhneh","Ndao","Thuet","Traore","Lopez"];
                $prenom = ["Fabrice","Paul","Pierre","Jacques","Igor","Valéry","Ange","Rudy","Modou","Moaath"];
                $photo = ["1","2","3","4","5"];
                $role = ["Admin","Utilisateur"];
                shuffle($nom);
                shuffle($prenom);
                shuffle($photo);
                shuffle($role);
            
                $utilisateurs->setNoms($nom[0]);
                $utilisateurs->setPrenoms($prenom[0]);
                $utilisateurs->setPhoto($photo[0]); 
                $utilisateurs->setDateNaissance(new \DateTime());
                $utilisateurs->setLogin("user");
                $utilisateurs->setPassword("mdp");
                $utilisateurs->setAdresse("10 rue de tartanpion");
                $utilisateurs->setEmail($faker->email);
                $utilisateurs->setRole($role[0]);
            $em->persist($utilisateurs);            
        $em->flush();
        return $this->render('utilisateurs/nouveau.html.twig', [
            'utilisateurs' => $utilisateurs,
        ]);
    }
    
      /**
     * @Route("/{id}", name="utilisateurs_show", methods={"GET"})
     */
    public function show(Utilisateurs $utilisateurs): Response
    {
        return $this->render('utilisateurs/affichage.html.twig', [
            'id'=>$utilisateurs->getId(),
            'utilisateurs' => $utilisateurs,
        ]);
    }
}
