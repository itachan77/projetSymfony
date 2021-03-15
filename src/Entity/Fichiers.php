<?php

namespace App\Entity;

use App\Repository\FichiersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FichiersRepository::class)
 */
class Fichiers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titreFichier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descrFichier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fichier;

    /**
     * @ORM\ManyToOne(targetEntity=Professeur::class, inversedBy="fichiers")
     */
    private $professeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreFichier(): ?string
    {
        return $this->titreFichier;
    }

    public function setTitreFichier(?string $titreFichier): self
    {
        $this->titreFichier = $titreFichier;

        return $this;
    }

    public function getDescrFichier(): ?string
    {
        return $this->descrFichier;
    }

    public function setDescrFichier(?string $descrFichier): self
    {
        $this->descrFichier = $descrFichier;

        return $this;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(?string $fichier): self
    {
        $this->fichier = $fichier;

        return $this;
    }

    public function getProfesseur(): ?Professeur
    {
        return $this->professeur;
    }

    public function setProfesseur(?Professeur $professeur): self
    {
        $this->professeur = $professeur;

        return $this;
    }
    

}
