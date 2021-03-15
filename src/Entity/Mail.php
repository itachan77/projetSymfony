<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\MailRepository;

/**
 * @ORM\Entity(repositoryClass=MailRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Mail
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
    private $fromMail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $toMail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $objetMail;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $messageMail;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="mails")
     */
    private $user;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateMail;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFromMail(): ?string
    {
        return $this->fromMail;
    }

    public function setFromMail(?string $fromMail): self
    {
        $this->fromMail = $fromMail;

        return $this;
    }

    public function getToMail(): ?string
    {
        return $this->toMail;
    }

    public function setToMail(?string $toMail): self
    {
        $this->toMail = $toMail;

        return $this;
    }

    public function getObjetMail(): ?string
    {
        return $this->objetMail;
    }

    public function setObjetMail(?string $objetMail): self
    {
        $this->objetMail = $objetMail;

        return $this;
    }

    public function getMessageMail(): ?string
    {
        return $this->messageMail;
    }

    public function setMessageMail(?string $messageMail): self
    {
        $this->messageMail = $messageMail;

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

    public function getDateMail(): ?\DateTimeInterface
    {
        return $this->dateMail;
        

    }

    public function setDateMail(?\DateTimeInterface $dateMail): self
    {
        
        $this->dateMail = $dateMail;

        return $this;
    }


    /**
     * @ORM\PrePersist
     */
    public function setDateMailValue()
    {
        $this->dateMail = new \DateTime();
        
        return $this;
    }


}
