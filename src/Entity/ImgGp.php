<?php

namespace App\Entity;

use App\Repository\ImgGpRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImgGpRepository::class)
 */
class ImgGp
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
    private $nomImgGp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $desImgGp;

    /**
     * @ORM\ManyToOne(targetEntity=ConcertGp::class, inversedBy="imgGp")
     */
    private $concertGp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomImgGp(): ?string
    {
        return $this->nomImgGp;
    }

    public function setNomImgGp(?string $nomImgGp): self
    {
        $this->nomImgGp = $nomImgGp;

        return $this;
    }

    public function getDesImgGp(): ?string
    {
        return $this->desImgGp;
    }

    public function setDesImgGp(?string $desImgGp): self
    {
        $this->desImgGp = $desImgGp;

        return $this;
    }

    public function getConcertGp(): ?ConcertGp
    {
        return $this->concertGp;
    }

    public function setConcertGp(?ConcertGp $concertGp): self
    {
        $this->concertGp = $concertGp;

        return $this;
    }
}
