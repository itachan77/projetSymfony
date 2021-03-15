<?php

namespace App\Entity;

use App\Repository\ImgCiRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImgCiRepository::class)
 */
class ImgCi
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
    private $nomImgCi;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $desImgCi;

    /**
     * @ORM\ManyToOne(targetEntity=ConcertInd::class, inversedBy="imgCi")
     */
    private $concertInd;


    public function __toString() 
    {
        return $this->nomImgCi.':ceci est le nom fichier toString';
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomImgCi(): ?string
    {
        return $this->nomImgCi;
    }

    public function setNomImgCi(?string $nomImgCi): self
    {
        $this->nomImgCi = $nomImgCi;

        return $this;
    }


    public function getDesImgCi(): ?string
    {
        return $this->desImgCi;
    }

    public function setDesImgCi(?string $desImgCi): self
    {
        $this->desImgCi = $desImgCi;

        return $this;
    }

    public function getConcertInd(): ?ConcertInd
    {
        return $this->concertInd;
    }

    public function setConcertInd(?ConcertInd $concertInd): self
    {
        $this->concertInd = $concertInd;

        return $this;
    }
}
