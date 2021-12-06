<?php

namespace App\DataFixtures;

use App\Entity\Auteur;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;



class AuteurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        // $roles = ['ROLE_USER', 'ROLE_EDITOR', 'ROLE_ADMIN', 'ROLE_SUPER_ADMIN'];
        // shuffle($roles);


        for ($i = 0; $i < 20; $i++) {
            $auteur = new Auteur();

            $auteur->setNoms($faker->name)
                ->setPrenoms($faker->lastname)
                ->setMail($faker->email)
                ->setPassword($faker->password);

            $manager->persist($auteur);
        }
        $manager->flush();
    }
}
