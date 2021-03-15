<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomCategorie;


    /**
     * @ORM\Column(type="text")
     */
    private $descrCategorie;

    /**
     * @ORM\ManyToMany(targetEntity=Professeur::class, inversedBy="categories", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $professeurs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photoCours;


    
    public function __construct()
    {
        $this->professeurs = new ArrayCollection();
    }


    public function __toString() 
    {
        return $this->nomCategorie;
    }




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorie(): ?string
    {
        return $this->nomCategorie;
    }

    public function setNomCategorie(string $nomCategorie): self
    {
        $this->nomCategorie = $nomCategorie;

        return $this;
    }




    public function getDescrCategorie(): ?string
    {
        return $this->descrCategorie;
    }

    public function setDescrCategorie(string $descrCategorie): self
    {
        $this->descrCategorie = $descrCategorie;

        return $this;
    }

    /**
     * @return Collection|Professeur[]
     */
    public function getProfesseurs(): Collection
    {
        return $this->professeurs;
    }

    public function addProfesseur(Professeur $professeur): self
    {
        if (!$this->professeurs->contains($professeur)) {
            $this->professeurs[] = $professeur;
        }

        return $this;
    }

    public function removeProfesseur(Professeur $professeur): self
    {
        $this->professeurs->removeElement($professeur);

        return $this;
    }

    public function getPhotoCours(): ?string
    {
        return $this->photoCours;
    }

    public function setPhotoCours(?string $photoCours): self
    {
        $this->photoCours = $photoCours;

        return $this;
    }




}
