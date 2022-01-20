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
            ->setMail("Toto")
            ->setPassword("123")
            ->setUsername("username")
            ->setRoles(["ROLE_USER"])
            ;
        $this->assertTrue($auteur->getNoms() === "Valdo");
        $this->assertTrue($auteur->getPrenoms() === "Fab");
        $this->assertTrue($auteur->getMail() === "Toto");
        $this->assertTrue($auteur->getPassword() === "123");
        $this->assertTrue($auteur->getUsername() === "username");
        $this->assertTrue($auteur->getRoles() === ["ROLE_USER"]);

    }

    public function testNonValide(): void
    {
        $article = new Article();
        $auteur = new Auteur();
        $auteur
            ->setNoms("Valdo")
            ->setPrenoms("Fab")
            ->setMail("Toto")
            ->setPassword("123")
            ->setUsername("username")
            ->setRoles(["ROLE_USER"])
            ;
        // $this->assertFalse(false);
        $this->assertFalse($auteur->getNoms() !== "Valdo");
        $this->assertFalse($auteur->getPrenoms() !== "Fab");
        $this->assertFalse($auteur->getMail() !== "Toto");
        $this->assertFalse($auteur->getPassword() !== "123");
        $this->assertFalse($auteur->getUsername() !== "username");
        $this->assertFalse($auteur->getRoles() !== ["ROLE_USER"]);
    }

    public function testVide(): void
    {
        $auteur = new Auteur();
        // $this->assertEmpty(empty);
        $this->assertEmpty($auteur->getId());
        $this->assertEmpty($auteur->getNoms());
        $this->assertEmpty($auteur->getPrenoms());
        $this->assertEmpty($auteur->getMail());
        $this->assertEmpty($auteur->getUsername());
    }

    public function testaddArticleValide()
    {
        $auteur = new Auteur();
        $article = new Article();

        // getArticle()
        $this->assertEmpty($auteur->getArticles());

        //addArticle()
        $auteur->addArticle($article);
        $this->assertContains($article,$auteur->getArticles());
        
        //removeArticle()
        $auteur->removeArticle($article);
        $this->assertEmpty($auteur->getArticles());
    }
}
