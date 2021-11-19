<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Categorie;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    // {

        
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
    {
        //Utilisation de fixtures avec faker
        $faker = Faker\Factory::create('fr_FR');

            // Créer 10 Catégories :

            for ($i=0 ; $i<5 ; $i++ )
            {
                $categorie = new Categorie();

                $categorie->setTitre($faker->sentence())
                        ->setResume($faker->sentence());

                $manager->persist($categorie);

                //Maintenant on créer les articles
                for ($j=0 ; $j<10 ; $j++)
                {                   
                    $articles = new Article();
                    
                    $articles->setTitre($faker->sentence())
                         ->setContenu($faker->sentence($nbWords = 20, $variableNbWords = true))  
                         // ->setDate(new \DateTime())
                         ->setResume($faker->sentence())
                         ->setImage($faker->sentence())
                         ->setCategorie($categorie);

                $manager->persist($articles);
                }
            }
        $manager->flush();
    }
}
