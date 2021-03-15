<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * 
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity=Eleve::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $eleve;

    /**
     * @ORM\OneToOne(targetEntity=Professeur::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $professeur;

    /**
     * @ORM\OneToMany(targetEntity=Mail::class, mappedBy="user")
     */
    private $mails;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $passAncien;

    public function __construct()
    {
        $this->mails = new ArrayCollection();
    }



    
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getEleve(): ?Eleve
    {
        return $this->eleve;
    }


    
    public function setEleve(?Eleve $eleve): self
    {
        // unset the owning side of the relation if necessary
        if ($eleve === null && $this->eleve !== null) {
            $this->eleve->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($eleve !== null && $eleve->getUser() !== $this) {
            $eleve->setUser($this);
        }

        $this->eleve = $eleve;

        return $this;
    }

    public function getProfesseur(): ?Professeur
    {
        return $this->professeur;
    }

    public function setProfesseur(?Professeur $professeur): self
    {
        // unset the owning side of the relation if necessary
        if ($professeur === null && $this->professeur !== null) {
            $this->professeur->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($professeur !== null && $professeur->getUser() !== $this) {
            $professeur->setUser($this);
        }

        $this->professeur = $professeur;

        return $this;
    }

    /**
     * @return Collection|Mail[]
     */
    public function getMails(): Collection
    {
        return $this->mails;
    }

    public function addMail(Mail $mail): self
    {
        if (!$this->mails->contains($mail)) {
            $this->mails[] = $mail;
            $mail->setUser($this);
        }

        return $this;
    }

    public function removeMail(Mail $mail): self
    {
        if ($this->mails->removeElement($mail)) {
            // set the owning side to null (unless already changed)
            if ($mail->getUser() === $this) {
                $mail->setUser(null);
            }
        }

        return $this;
    }

    public function getPassAncien(): ?string
    {
        return $this->passAncien;
    }

    public function setPassAncien(?string $passAncien): self
    {
        $this->passAncien = $passAncien;

        return $this;
    }






}
