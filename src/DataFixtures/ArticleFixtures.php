<?php

namespace App\DataFixtures;

use App\Entity\Article;

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

            for ($i=0 ; $i<20 ; $i++ )
            {
                $articles = new Article();
            
                $articles->setTitre($faker->sentence())
                        ->setContenu($faker->sentence($nbWords = 20, $variableNbWords = true))  
                        ->setDate(new \DateTime())
                        ->setResume($faker->sentence())
                        ->setImage($faker->sentence());
            $manager->persist($articles);
            }
        $manager->flush();
    }
}
