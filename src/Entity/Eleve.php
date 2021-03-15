<?php

namespace App\Entity;

use App\Repository\EleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EleveRepository::class)
 */
class Eleve
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dinscriptionEleve;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomEleve;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenomEleve;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $naissanceEleve;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseEleve;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel1Eleve;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel2Eleve;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel3Eleve;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel4Eleve;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photoEleve;

    /**
     * @ORM\OneToOne(targetEntity=ConnuPar::class, cascade={"persist", "remove"})
     */
    private $nomConnuPar;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datecreationEleve;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $informationEleve;

    /**
     * @ORM\OneToOne(targetEntity=InfoInstrument::class, cascade={"persist", "remove"})
     */
    private $infoI;

    /**
     * @ORM\OneToOne(targetEntity=Tuteur::class, cascade={"persist", "remove"})
     */
    private $tuteur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emailEleve;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="eleve", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $selectEleve;

    /**
     * @ORM\ManyToMany(targetEntity=Professeur::class, inversedBy="eleves", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $professeur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cpville;

    /**
     * @ORM\ManyToMany(targetEntity=Categorie::class, inversedBy="eleves", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $Category;

    /**
     * @ORM\ManyToMany(targetEntity=Groupe::class, inversedBy="eleves")
     */
    private $groupe;





    public function __construct()
    {
        $this->professeur = new ArrayCollection();
        $this->Category = new ArrayCollection();
        $this->groupe = new ArrayCollection();
        $this->user = new ArrayCollection();

        
    }



    public function __toString() 
    {
        return $this->nomEleve.' '.$this->prenomEleve;
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDinscriptionEleve(): ?\DateTimeInterface
    {
        return $this->dinscriptionEleve;
    }

    public function setDinscriptionEleve(?\DateTimeInterface $dinscriptionEleve): self
    {
        $this->dinscriptionEleve = $dinscriptionEleve;

        return $this;
    }

    public function getNomEleve(): ?string
    {
        return $this->nomEleve;
    }

    public function setNomEleve(string $nomEleve): self
    {
        $this->nomEleve = $nomEleve;

        return $this;
    }

    public function getPrenomEleve(): ?string
    {
        return $this->prenomEleve;
    }

    public function setPrenomEleve(?string $prenomEleve): self
    {
        $this->prenomEleve = $prenomEleve;

        return $this;
    }

    public function getNaissanceEleve(): ?\DateTimeInterface
    {
        return $this->naissanceEleve;
    }

    public function setNaissanceEleve(?\DateTimeInterface $naissanceEleve): self
    {
        $this->naissanceEleve = $naissanceEleve;

        return $this;
    }

    public function getAdresseEleve(): ?string
    {
        return $this->adresseEleve;
    }

    public function setAdresseEleve(?string $adresseEleve): self
    {
        $this->adresseEleve = $adresseEleve;

        return $this;
    }

    public function getTel1Eleve(): ?string
    {
        return $this->tel1Eleve;
    }

    public function setTel1Eleve(?string $tel1Eleve): self
    {
        $this->tel1Eleve = $tel1Eleve;

        return $this;
    }

    public function getTel2Eleve(): ?string
    {
        return $this->tel2Eleve;
    }

    public function setTel2Eleve(?string $tel2Eleve): self
    {
        $this->tel2Eleve = $tel2Eleve;

        return $this;
    }

    public function getTel3Eleve(): ?string
    {
        return $this->tel3Eleve;
    }

    public function setTel3Eleve(?string $tel3Eleve): self
    {
        $this->tel3Eleve = $tel3Eleve;

        return $this;
    }

    public function getTel4Eleve(): ?string
    {
        return $this->tel4Eleve;
    }

    public function setTel4Eleve(?string $tel4Eleve): self
    {
        $this->tel4Eleve = $tel4Eleve;

        return $this;
    }


    public function getInformationEleve(): ?string
    {
        return $this->informationEleve;
    }

    public function setInformationEleve(?string $informationEleve): self
    {
        $this->informationEleve = $informationEleve;

        return $this;
    }



    public function getPhotoEleve(): ?string
    {
        return $this->photoEleve;
    }

    public function setPhotoEleve(?string $photoEleve): self
    {
        $this->photoEleve = $photoEleve;

        return $this;
    }


    
    public function getNomConnuPar(): ?ConnuPar
    {
        return $this->nomConnuPar;
    }

    public function setNomConnuPar(?ConnuPar $nomConnuPar): self
    {
        $this->nomConnuPar = $nomConnuPar;

        return $this;
    }


/**
 * @ORM\PrePersist
 */
public function setDatecreationEleveValue()
{
    $this->DatecreationEleve = new \DateTime();
}


    public function getDatecreationEleve(): ?\DateTimeInterface
    {
        return $this->datecreationEleve;
    }

    public function setDatecreationEleve(?\DateTimeInterface $datecreationEleve): self
    {
        $this->datecreationEleve = $datecreationEleve;

        return $this;
    }

    public function getInfoI(): ?InfoInstrument
    {
        return $this->infoI;
    }

    public function setInfoI(?InfoInstrument $infoI): self
    {
        $this->infoI = $infoI;

        return $this;
    }

    public function getTuteur(): ?Tuteur
    {
        return $this->tuteur;
    }

    public function setTuteur(?Tuteur $tuteur): self
    {
        $this->tuteur = $tuteur;

        return $this;
    }

    public function getEmailEleve(): ?string
    {
        return $this->emailEleve;
    }

    public function setEmailEleve(?string $emailEleve): self
    {
        $this->emailEleve = $emailEleve;

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

    public function getSelectEleve(): ?bool
    {
        return $this->selectEleve;
    }

    public function setSelectEleve(?bool $selectEleve): self
    {
        $this->selectEleve = $selectEleve;

        return $this;
    }

    
    /**
     * @return Collection|Professeur[]
     */
    public function getProfesseur(): Collection
    {
        return $this->professeur;
    }

    public function addProfesseur(Professeur $professeur): self
    {
        if (!$this->professeur->contains($professeur)) {
            $this->professeur[] = $professeur;
        }

        return $this;
    }

    public function removeProfesseur(Professeur $professeur): self
    {
        $this->professeur->removeElement($professeur);

        return $this;
    }

    public function getCpville(): ?string
    {
        return $this->cpville;
    }

    public function setCpville(?string $cpville): self
    {
        $this->cpville = $cpville;

        return $this;
    }



    /**
     * @return Collection|Categorie[]
     */
    public function getCategory(): Collection
    {
        return $this->Category;
    }

    public function addCategory(Categorie $Category): self
    {
        if (!$this->Category->contains($Category)) {
            $this->Category[] = $Category;
        }

        return $this;
    }

    public function removeCategory(Categorie $Category): self
    {
        $this->Category->removeElement($Category);

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
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
        $this->groupe->removeElement($groupe);

        return $this;
    }







    





}
