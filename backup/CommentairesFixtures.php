<?php

namespace App\DataFixtures;

use Faker;

use App\Entity\Commentaires;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;


class CommentairesFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void   
    {
        //Utilisation de fixtures avec faker
        $faker = Faker\Factory::create('fr_FR');
        
        //Creation de commentaire

        for ($m = 0; $m <20; $m++) {
            $commentaire = new Commentaires();
            $articles = mt_rand(1 , 1000);

            $commentaire->setAuteur($faker->name)
                ->setDate(new \DateTime())
                ->setMail($faker->email)
                ->setCommentaire($faker->sentence())
                ->setArticle($articles[0]);

            $manager->persist($commentaire);
        }
    $manager->flush();
    }
    public static function getGroups(): array
    {
        return ['group6'];
    }
}
