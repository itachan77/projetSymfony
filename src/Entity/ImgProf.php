<?php

namespace App\Entity;

use App\Repository\ImgProfRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImgProfRepository::class)
 */
class ImgProf
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
    private $nomImgProf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $desImgProf;

    /**
     * @ORM\ManyToOne(targetEntity=ConcertProf::class, inversedBy="imgProf")
     */
    private $concertProf;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomImgProf(): ?string
    {
        return $this->nomImgProf;
    }

    public function setNomImgProf(?string $nomImgProf): self
    {
        $this->nomImgProf = $nomImgProf;

        return $this;
    }

    public function getDesImgProf(): ?string
    {
        return $this->desImgProf;
    }

    public function setDesImgProf(?string $desImgProf): self
    {
        $this->desImgProf = $desImgProf;

        return $this;
    }

    public function getConcertProf(): ?ConcertProf
    {
        return $this->concertProf;
    }

    public function setConcertProf(?ConcertProf $concertProf): self
    {
        $this->concertProf = $concertProf;

        return $this;
    }
}
