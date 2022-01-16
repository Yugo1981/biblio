<?php

use App\Entity\Auteur;
namespace App\Tests\Entity;

use App\Entity\Auteur;
use PHPUnit\Framework\TestCase;

class AuteurTest extends TestCase
{
    public function testValide(): void
    {
        $auteur = New Auteur();
        $auteur
            ->setNoms("Valdo");

        $this->assertTrue($auteur->getNoms() === "Valdo");
    }

    public function testNonValide(): void
    {
        $auteur = new Auteur();
        $auteur
            ->setNoms("Valdo")
        ;
        // $this->assertTrue(true);
        $this->assertFalse($auteur->getNoms() !== "Valdo");
    }

    public function testVide(): void
    {
        $auteur = new Auteur();
        // $this->assertTrue(true);
        $this->assertEmpty($auteur->getNoms());
    }
}
