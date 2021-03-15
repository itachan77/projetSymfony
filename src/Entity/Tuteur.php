<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TuteurRepository;


/**
 * @ORM\Entity(repositoryClass=TuteurRepository::class)
 */
class Tuteur
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
    private $prenomTuteur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomTuteur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseTuteur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel1Tuteur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel2Tuteur;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenomTuteur(): ?string
    {
        return $this->prenomTuteur;
    }

    public function setPrenomTuteur(?string $prenomTuteur): self
    {
        $this->prenomTuteur = $prenomTuteur;

        return $this;
    }

    public function getNomTuteur(): ?string
    {
        return $this->nomTuteur;
    }

    public function setNomTuteur(?string $nomTuteur): self
    {
        $this->nomTuteur = $nomTuteur;

        return $this;
    }

    public function getAdresseTuteur(): ?string
    {
        return $this->adresseTuteur;
    }

    public function setAdresseTuteur(?string $adresseTuteur): self
    {
        $this->adresseTuteur = $adresseTuteur;

        return $this;
    }

    public function getTel1Tuteur(): ?string
    {
        return $this->tel1Tuteur;
    }

    public function setTel1Tuteur(?string $tel1Tuteur): self
    {
        $this->tel1Tuteur = $tel1Tuteur;

        return $this;
    }

    public function getTel2Tuteur(): ?string
    {
        return $this->tel2Tuteur;
    }

    public function setTel2Tuteur(?string $tel2Tuteur): self
    {
        $this->tel2Tuteur = $tel2Tuteur;

        return $this;
    }

    public function getEleve(): ?Eleve
    {
        return $this->eleve;
    }

    public function setEleve(?Eleve $eleve): self
    {
        $this->eleve = $eleve;

        return $this;
    }




}
