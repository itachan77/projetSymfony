<?php

namespace App\Entity;

use App\Repository\ConcertProfRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcertProfRepository::class)
 */
class ConcertProf
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
    private $titreConcertProf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logoConcertProf;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comConcertProf;

    /**
     * @ORM\OneToMany(targetEntity=ImgProf::class, mappedBy="concertProf")
     */
    private $imgProf;

    public function __construct()
    {
        $this->imgProf = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreConcertProf(): ?string
    {
        return $this->titreConcertProf;
    }

    public function setTitreConcertProf(?string $titreConcertProf): self
    {
        $this->titreConcertProf = $titreConcertProf;

        return $this;
    }

    public function getLogoConcertProf(): ?string
    {
        return $this->logoConcertProf;
    }

    public function setLogoConcertProf(?string $logoConcertProf): self
    {
        $this->logoConcertProf = $logoConcertProf;

        return $this;
    }

    public function getComConcertProf(): ?string
    {
        return $this->comConcertProf;
    }

    public function setComConcertProf(?string $comConcertProf): self
    {
        $this->comConcertProf = $comConcertProf;

        return $this;
    }

    /**
     * @return Collection|ImgProf[]
     */
    public function getImgProf(): Collection
    {
        return $this->imgProf;
    }

    public function addImgProf(ImgProf $imgProf): self
    {
        if (!$this->imgProf->contains($imgProf)) {
            $this->imgProf[] = $imgProf;
            $imgProf->setConcertProf($this);
        }

        return $this;
    }

    public function removeImgProf(ImgProf $imgProf): self
    {
        if ($this->imgProf->removeElement($imgProf)) {
            // set the owning side to null (unless already changed)
            if ($imgProf->getConcertProf() === $this) {
                $imgProf->setConcertProf(null);
            }
        }

        return $this;
    }
}
