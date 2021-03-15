<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
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
    private $titreContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenomContact;


    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $emailContact;



    /**
     * @ORM\Column(type="text")
     */
    private $messageContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ageContact;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $reponseContact;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreContact(): ?string
    {
        return $this->titreContact;
    }

    public function setTitreContact(?string $titreContact): self
    {
        $this->titreContact = $titreContact;

        return $this;
    }

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(string $nomContact): self
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->prenomContact;
    }

    public function setPrenomContact(?string $prenomContact): self
    {
        $this->prenomContact = $prenomContact;

        return $this;
    }



    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(?string $emailContact): self
    {
        $this->emailContact = $emailContact;

        return $this;
    }


    public function getMessageContact(): ?string
    {
        return $this->messageContact;
    }

    public function setMessageContact(string $messageContact): self
    {
        $this->messageContact = $messageContact;

        return $this;
    }

    public function getAgeContact(): ?string
    {
        return $this->ageContact;
    }

    public function setAgeContact(?string $ageContact): self
    {
        $this->ageContact = $ageContact;

        return $this;
    }

    public function getReponseContact(): ?string
    {
        return $this->reponseContact;
    }

    public function setReponseContact(?string $reponseContact): self
    {
        $this->reponseContact = $reponseContact;

        return $this;
    }
}
