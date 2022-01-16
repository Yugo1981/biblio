<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Article;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        
    //     for ($i=0; $i<20 ; $i++ ) 
    //     { 
    //         $articles = new Article();
            
    //         $articles->setTitre(" Titre de l'article N°$i ")
    //                 ->setContenu(" Contenu de l'article N° $i ")
    //                 ->setDate(new \DateTime());   
            
    //         $manager->persist($articles);
    //     }
    //  $manager->flush();
    // }
    // {
    //     //Utilisation de fixtures avec faker
    //     $faker = Faker\Factory::create('fr_FR');

    //         // Créer 10 Catégories :

    //         for ($i=0 ; $i<20 ; $i++ )
    //         {
    //             $categorie = new Categorie();

    //             $categorie->setTitre($faker->sentence())
    //                     ->setResume($faker->sentence());

    //             $manager->persist($categorie);

    //         // Création des auteurs :
    //         for($f=0 ; $f<20 ; $f++ )
    //         {
    //             $auteur = New Auteur();
    //             $auteur->setNoms($faker->lastName);
    //             $auteur->setPrenoms($faker->firstName);
    //             $auteur->setMail($faker->email);
    //             $auteur->setPassword($faker->password);   

    //             $manager->persist($auteur);
    //         }

    //         //Maintenant on créer les articles
    //         for ($j=0 ; $j<20 ; $j++)
    //         {                   
    //             $articles = new Article();
    //             $statut = ["Publier" , "Depublier" , "Archiver"];
    //             shuffle($statut);

                
    //             $articles->setTitre($faker->sentence())
    //                  ->setContenu($faker->sentence($nbWords = 20, $variableNbWords = true))  
    //                  ->setResume($faker->sentence())
    //                  ->setImage($faker->sentence())
    //                  ->setCategorie($categorie)
    //                  ->setAuteur($auteur)
    //                  ->setStatut($statut[0]);

    //         $manager->persist($articles);
    //         }

    //         //Creation d'utilisateur
            
    //         for ($l=0 ; $l<20 ; $l++ )
    //         {
    //             $utilisateurs = new Utilisateurs();
    //             $nom = ["Follereau","Nwelha","Planiteye","Palakot","Nabi","Khassaowhneh","Ndao","Thuet","Traore","Lopez"];
    //             $prenom = ["Fabrice","Paul","Pierre","Jacques","Igor","Valéry","Ange","Rudy","Modou","Moaath"];
    //             $photo = ["1","2","3","4","5"];
    //             $role = ["ROLE_USER","ROLE_ADMIN"];
    //             $civil = ["Monsieur" , "Madame"];
    //             $statu = ["Publier" , "Depublier" , "Archiver"];
    //             shuffle($nom);
    //             shuffle($prenom);
    //             shuffle($photo);
    //             shuffle($role);
    //             shuffle($civil);
    //             shuffle($statu);
            
    //             $utilisateurs->setNoms($nom[0])
    //                     ->setPrenoms($prenom[0])
    //                     ->setPhoto($photo[0])
    //                     ->setDateNaissance(New \Datetime())
    //                     ->setLogin("user $l")
    //                     ->setPassword($faker->password)
    //                     ->setAdresse($faker->address)
    //                     ->setEmail($faker->email)
    //                     ->setRoles([0])
    //                     ->setCivilite($civil[0])
    //                     ->setStatut($statu[0]);
    //         $manager->persist($utilisateurs);
    //         }

    //         //Creation de location

    //         for ($k=0 ; $k<20 ; $k++ )
    //         {
    //             $locations = new Location();
    //             $categorie = ["Adulte","Jeunesse", "Roman","Policier","Poésie","Aventure","Histoire","Informatique" ];
    //             shuffle($categorie);
    //             $image = ["1","2","3","4","5"];
    //             $valeur = ["0.5","1","1.5","2","2.5","5","10","15","20"];
    //             shuffle($valeur);
    //             $status = ["Disponible","En prêt","Relance pour rendre"];
    //             shuffle($status);
    //             $acces = ["Disponible","Indisponible"];
    //             shuffle($acces);
    //             $a_la_une = ["1","2","3","4","5","6"];
    //             shuffle($a_la_une);
    //             $locations->setDate(New \Datetime())
    //                     ->setTitre("Titre numéro $k")
    //                     ->setcategorie($categorie[0])
    //                     ->setImage($image[0])
    //                     ->setDescription("Description de $k")
    //                     ->setValeur($valeur[0])
    //                     ->setAdresse($faker->address)
    //                     ->setAccessibility($acces[0])
    //                     ->setStatus($status[0])
    //                     ->setALaUne($a_la_une[0]);
                        
    //         $manager->persist($locations);
    //         }

    //         //Creation de commentaire

    //         for ($m = 0; $m <20; $m++) {
    //             $commentaire = new Commentaires();
    
    //             $commentaire->setAuteur($faker->name)
    //                 ->setDate(new \DateTime())
    //                 ->setMail($faker->email)
    //                 ->setCommentaire($faker->sentence())
    //                 ->setArticle($articles);
    
    //             $manager->persist($commentaire);
    //         }           
    //         }
    //     $manager->flush();
    // }

             //Utilisation de fixtures avec faker
            $faker = Faker\Factory::create('fr_FR');

            // Maintenant on créer les articles
            for ($j=0 ; $j<1000 ; $j++)
            {                   
                $articles = new Article();
                $statut = ["Publier" , "Depublier" , "Archiver"];
                $auteur = ["Follereau","Nwelha","Planiteye","Palakot","Nabi","Khassaowhneh","Ndao","Thuet","Traore","Lopez"];
                $categorie = ["Sport" , "Roman" , "Histoire" , "Géographie" , "Sexe" , "Philosophie"];
                shuffle($statut);
                shuffle($categorie);

                
                $articles->setTitre($faker->sentence())
                     ->setContenu($faker->sentence($nbWords = 20, $variableNbWords = true))  
                     ->setResume($faker->sentence())
                     ->setImageFile($faker->image)
                    //  ->setCategorie($categorie[0])
                    //  ->setAuteur($auteur[0])
                     ->setStatut($statut[0]);

            $manager->persist($articles);
            }
        $manager->flush();
        }
        public static function getGroups(): array
        {
            return ['group4'];
        }
}