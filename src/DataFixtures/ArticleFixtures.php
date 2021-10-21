<?php

namespace App\DataFixtures;

use App\Entity\Article;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        
        for ($i=0; $i<20 ; $i++ ) 
        { 
            $articles = new Article();
            
            $articles->setTitre(" Titre de l'article N°$i ")
                    ->setContenu(" Contenu de l'article N° $i ")
                    ->setDate(new \DateTime());   
            
            $manager->persist($articles);
        }
     $manager->flush();
    }
}
