<?php

use App\Entity\Auteur;
namespace App\Tests\Entity;

use App\Entity\Article;
use App\Entity\Auteur;
use PHPUnit\Framework\TestCase;

class AuteurTest extends TestCase
{
    public function testValide(): void
    {
        $article = new Article();
        $auteur = New Auteur();
        $auteur
            ->setNoms("Valdo")
            ->setPrenoms("Fab")
            ->setMail("Toto@toto.fr")
            ->setPassword("123")
            ->setArticles($article)
            ;
        $this->assertTrue($auteur->getNoms() === "Valdo");
        $this->assertTrue($auteur->getPrenoms() === "Fab");
        $this->assertTrue($auteur->getMail() === "Toto@toto.fr");
        $this->assertTrue($auteur->getPassword() === "123");
        $this->assertTrue($auteur->getArticles() === $article);
    }

    public function testNonValide(): void
    {
        $article = new Article();
        $auteur = new Auteur();
        $auteur
            ->setNoms("Valdo")
            ->setPrenoms("Fab")
            ->setMail("Toto@toto.fr")
            ->setPassword("123")
            ->setArticles($article)
            ;
        // $this->assertFalse(false);
        $this->assertFalse($auteur->getNoms() !== "Valdo");
        $this->assertFalse($auteur->getPrenoms() !== "Fab");
        $this->assertFalse($auteur->getMail() !== "Toto@toto.fr");
        $this->assertFalse($auteur->getPassword() !== "123");
        $this->assertFalse($auteur->getArticles() !== $article);
    }

    public function testVide(): void
    {
        $auteur = new Auteur();
        // $this->assertEmpty(empty);
        $this->assertEmpty($auteur->getId());
        $this->assertEmpty($auteur->getNoms());
        $this->assertEmpty($auteur->getPrenoms());
        $this->assertEmpty($auteur->getMail());
        $this->assertEmpty($auteur->getPassword());
        $this->assertEmpty($auteur->getArticles());
    }

    public function addArticleValide(Article $article): self
    {
        $article = new Article();
        $result = $article->add("Maurice");

        //assert true(true)
        $this->assertEquals("Maurice" , $result);
    }
}
