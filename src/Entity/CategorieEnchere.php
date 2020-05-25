<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieEnchereRepository")
 */
class CategorieEnchere
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_categorie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Enchere", mappedBy="categorieEnchere")
     */
    private $Enchere;

    public function __construct()
    {
        $this->Enchere = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorie(): ?string
    {
        return $this->nom_categorie;
    }

    public function setNomCategorie(string $nom_categorie): self
    {
        $this->nom_categorie = $nom_categorie;

        return $this;
    }

    public function __toString()
    {
        return $this->nom_categorie;
    }

    /**
     * @return Collection|Enchere[]
     */
    public function getEnchere(): Collection
    {
        return $this->Enchere;
    }

    public function addEnchere(Enchere $enchere): self
    {
        if (!$this->Enchere->contains($enchere)) {
            $this->Enchere[] = $enchere;
            $enchere->setCategorieEnchere($this);
        }

        return $this;
    }

    public function removeEnchere(Enchere $enchere): self
    {
        if ($this->Enchere->contains($enchere)) {
            $this->Enchere->removeElement($enchere);
            // set the owning side to null (unless already changed)
            if ($enchere->getCategorieEnchere() === $this) {
                $enchere->setCategorieEnchere(null);
            }
        }

        return $this;
    }
}
