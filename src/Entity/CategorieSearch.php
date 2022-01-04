<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

class CategorieSearch
{
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie")
     */
    
    private $categorie;    

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
