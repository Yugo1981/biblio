<?php

namespace App\Tests\Entity;

use App\Entity\Categorie;
use PHPUnit\Framework\TestCase;

class CategorieTest extends TestCase
{
    public function testValide(): void
    {
        $categorie = New Categorie();
        $categorie
                ->setTitre("Valdo écarte les cuisses")
                ->setResume("Le droit de cuissage");

        //voir si les assert sont vrai        
        $this->assertTrue($categorie->getTitre() === "Valdo écarte les cuisses");
        $this->assertTrue($categorie->getResume() === "Le droit de cuissage");
    }

    public function testNonValide(): void
    {
        $categorie = new Categorie();
        $categorie
            ->setTitre("Valdo écarte les cuisses")
            ->setResume("Le droit de cuissage")
        ;
        // $this->assertTrue(true);
        $this->assertFalse($categorie->getTitre() !== "Valdo écarte les cuisses");
        $this->assertFalse($categorie->getResume() !== "Le droit de cuissage");
    }

    public function testVide(): void
    {
        $categorie = new Categorie();
        // $this->assertEmpty(empty);
        $this->assertEmpty($categorie->getId());
        $this->assertEmpty($categorie->getTitre());
        $this->assertEmpty($categorie->getResume());
        $this->assertEmpty($categorie->getArticle());
    }
}
