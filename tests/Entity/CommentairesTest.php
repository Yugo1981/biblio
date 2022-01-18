<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Commentaires;
use DateTime;

class CommentairesTest extends TestCase
{
    public function testValide(): void
    {
        $date = new DateTime();
        $commentaires = New Commentaires();
        $commentaires
                    ->setAuteur("Yugo")
                    ->setMail("Valdo@toto.fr")
                    ->setDate($date)
                    ->setCommentaire("La vie")
                    ;

        $this->assertTrue($commentaires->getAuteur() === "Yugo");
        $this->assertTrue($commentaires->getMail() === "Valdo@toto.fr");
        $this->assertTrue($commentaires->getDate() === $date);
        $this->assertTrue($commentaires->getCommentaire() === "La vie");
    }

    public function testNonValide(): void
    {
        $date = new DateTime();
        $commentaires = new Commentaires();
        $commentaires
            ->setAuteur("Valdo")
            ->setMail("Toto@toto.fr")
            ->setDate($date)
            ->setCommentaire("123 soleil")
            ;
        // $this->assertTrue(true);
        $this->assertFalse($commentaires->getAuteur() !== "Valdo");
        $this->assertFalse($commentaires->getMail() !== "Toto@toto.fr");
        $this->assertFalse($commentaires->getDate() !== $date);
        $this->assertFalse($commentaires->getCommentaire() !== "123 soleil");
    }

    public function testVide(): void
    {
        $commentaires = new Commentaires();
        // $this->assertEmpty(Empty);
        $this->assertEmpty($commentaires->getId());
        $this->assertEmpty($commentaires->getAuteur());
        $this->assertEmpty($commentaires->getMail());
        $this->assertEmpty($commentaires->getDate());
        $this->assertEmpty($commentaires->getCommentaire());
    }
}
