<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupeRepository::class)
 */
class Groupe
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
    private $nomGroupe;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionGroupe;

    /**
     * @ORM\ManyToOne(targetEntity=Professeur::class, inversedBy="groupe")
     */
    private $professeur;

    /**
     * @ORM\ManyToMany(targetEntity=Eleve::class, mappedBy="groupe")
     */
    private $eleves;

    /**
     * @ORM\ManyToMany(targetEntity=Calendar::class, mappedBy="groupes")
     */
    private $calendars;



    public function __construct()
    {
        $this->eleves = new ArrayCollection();
        $this->calendars = new ArrayCollection();
    }

    public function __toString() 
    {
        return $this->nomGroupe.'';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomGroupe(): ?string
    {
        return $this->nomGroupe;
    }

    public function setNomGroupe(?string $nomGroupe): self
    {
        $this->nomGroupe = $nomGroupe;

        return $this;
    }

    public function getDescriptionGroupe(): ?string
    {
        return $this->descriptionGroupe;
    }

    public function setDescriptionGroupe(?string $descriptionGroupe): self
    {
        $this->descriptionGroupe = $descriptionGroupe;

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

    /**
     * @return Collection|Eleve[]
     */
    public function getEleves(): Collection
    {
        return $this->eleves;
    }

    public function addElefe(Eleve $elefe): self
    {
        if (!$this->eleves->contains($elefe)) {
            $this->eleves[] = $elefe;
            $elefe->addGroupe($this);
        }

        return $this;
    }

    public function removeElefe(Eleve $elefe): self
    {
        if ($this->eleves->removeElement($elefe)) {
            $elefe->removeGroupe($this);
        }

        return $this;
    }

    /**
     * @return Collection|Calendar[]
     */
    public function getCalendars(): Collection
    {
        return $this->calendars;
    }

    public function addCalendar(Calendar $calendar): self
    {
        if (!$this->calendars->contains($calendar)) {
            $this->calendars[] = $calendar;
            $calendar->addGroupe($this);
        }

        return $this;
    }

    public function removeCalendar(Calendar $calendar): self
    {
        if ($this->calendars->removeElement($calendar)) {
            $calendar->removeGroupe($this);
        }

        return $this;
    }





}
