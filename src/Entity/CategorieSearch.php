<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

class CategorieSearch
{
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie")
     */
    
    private $categorie;    

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
