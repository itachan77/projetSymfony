<?php

namespace App\Entity;

use App\Repository\InfoInstrumentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InfoInstrumentRepository::class)
 */
class InfoInstrument
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $havemusic;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $whathavemusic;



    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $doinstrument;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $whatdoinstrument;



    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $haveinstrument;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $whathaveinstrument;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWhathavemusic(): ?string
    {
        return $this->whathavemusic;
    }

    public function setWhathavemusic(?string $whathavemusic): self
    {
        $this->whathavemusic = $whathavemusic;

        return $this;
    }

    public function getHavemusic(): ?bool
    {
        return $this->havemusic;
    }

    public function setHavemusic(?bool $havemusic): self
    {
        $this->havemusic = $havemusic;

        return $this;
    }

    public function getDoinstrument(): ?bool
    {
        return $this->doinstrument;
    }

    public function setDoinstrument(?bool $doinstrument): self
    {
        $this->doinstrument = $doinstrument;

        return $this;
    }

    public function getWhatdoinstrument(): ?string
    {
        return $this->whatdoinstrument;
    }

    public function setWhatdoinstrument(string $whatdoinstrument): self
    {
        $this->whatdoinstrument = $whatdoinstrument;

        return $this;
    }

    public function getHaveinstrument(): ?bool
    {
        return $this->haveinstrument;
    }

    public function setHaveinstrument(?bool $haveinstrument): self
    {
        $this->haveinstrument = $haveinstrument;

        return $this;
    }

    public function getWhathaveinstrument(): ?string
    {
        return $this->whathaveinstrument;
    }

    public function setWhathaveinstrument(?string $whathaveinstrument): self
    {
        $this->whathaveinstrument = $whathaveinstrument;

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
