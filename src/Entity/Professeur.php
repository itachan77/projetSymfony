<?php

namespace App\Entity;

use App\Repository\ProfesseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfesseurRepository::class)
 */
class Professeur
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
    private $titreProf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomProf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenomProf;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photoProf;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionProf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $professionProf;


    /**
     * @ORM\ManyToMany(targetEntity=Categorie::class, mappedBy="professeurs")
     * @ORM\JoinColumn(nullable=true)
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity=Eleve::class, mappedBy="professeur")
     * @ORM\JoinColumn(nullable=true)
     */
    private $eleves;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emailProf;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="professeur", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $selectProf;

    /**
     * @ORM\OneToMany(targetEntity=Fichiers::class, mappedBy="professeur")
     */
    private $fichiers;

    /**
     * @ORM\OneToMany(targetEntity=Groupe::class, mappedBy="professeur")
     */
    private $groupe;

    /**
     * @ORM\ManyToMany(targetEntity=Calendar::class, inversedBy="professeurs")
     */
    private $calendrier;


    
    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->eleves = new ArrayCollection();
        $this->fichiers = new ArrayCollection();
        $this->groupe = new ArrayCollection();
        $this->calendrier = new ArrayCollection();
    }

    public function __toString() 
    {
        return $this->nomProf.' '.$this->prenomProf;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreProf(): ?string
    {
        return $this->titreProf;
    }

    public function setTitreProf(?string $titreProf): self
    {
        $this->titreProf = $titreProf;

        return $this;
    }

    public function getNomProf(): ?string
    {
        return $this->nomProf;
    }

    public function setNomProf(?string $nomProf): self
    {
        $this->nomProf = $nomProf;

        return $this;
    }

    public function getPrenomProf(): ?string
    {
        return $this->prenomProf;
    }

    public function setPrenomProf(?string $prenomProf): self
    {
        $this->prenomProf = $prenomProf;

        return $this;
    }

    public function getPhotoProf(): ?string
    {
        return $this->photoProf;
    }

    public function setPhotoProf(?string $photoProf): self
    {
        $this->photoProf = $photoProf;

        return $this;
    }

    public function getDescriptionProf(): ?string
    {
        return $this->descriptionProf;
    }

    public function setDescriptionProf(?string $descriptionProf): self
    {
        $this->descriptionProf = $descriptionProf;

        return $this;
    }

    public function getProfessionProf(): ?string
    {
        return $this->professionProf;
    }

    public function setProfessionProf(?string $professionProf): self
    {
        $this->professionProf = $professionProf;

        return $this;
    }

    public function getSelectProf(): ?bool
    {
        return $this->selectProf;
    }

    public function setSelectProf(?bool $selectProf): self
    {
        $this->selectProf = $selectProf;

        return $this;
    }



    /**
     * @return Collection|Categorie[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addProfesseur($this);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removeProfesseur($this);
        }

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
            $elefe->addProfesseur($this);
        }

        return $this;
    }

    public function removeElefe(Eleve $elefe): self
    {
        if ($this->eleves->removeElement($elefe)) {
            $elefe->removeProfesseur($this);
        }

        return $this;
    }

    public function getEmailProf(): ?string
    {
        return $this->emailProf;
    }

    public function setEmailProf(?string $emailProf): self
    {
        $this->emailProf = $emailProf;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Fichiers[]
     */
    public function getFichiers(): Collection
    {
        return $this->fichiers;
    }

    public function addFichier(Fichiers $fichier): self
    {
        if (!$this->fichiers->contains($fichier)) {
            $this->fichiers[] = $fichier;
            $fichier->setProfesseur($this);
        }

        return $this;
    }

    public function removeFichier(Fichiers $fichier): self
    {
        if ($this->fichiers->removeElement($fichier)) {
            // set the owning side to null (unless already changed)
            if ($fichier->getProfesseur() === $this) {
                $fichier->setProfesseur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Groupe[]
     */
    public function getGroupe(): Collection
    {
        return $this->groupe;
    }

    public function addGroupe(Groupe $groupe): self
    {
        if (!$this->groupe->contains($groupe)) {
            $this->groupe[] = $groupe;
            $groupe->setProfesseur($this);
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
        if ($this->groupe->removeElement($groupe)) {
            // set the owning side to null (unless already changed)
            if ($groupe->getProfesseur() === $this) {
                $groupe->setProfesseur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Calendar[]
     */
    public function getCalendrier(): Collection
    {
        return $this->calendrier;
    }

    public function addCalendrier(Calendar $calendrier): self
    {
        if (!$this->calendrier->contains($calendrier)) {
            $this->calendrier[] = $calendrier;
        }

        return $this;
    }

    public function removeCalendrier(Calendar $calendrier): self
    {
        $this->calendrier->removeElement($calendrier);

        return $this;
    }


}
