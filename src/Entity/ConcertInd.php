<?php

namespace App\Entity;

use App\Repository\ConcertIndRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcertIndRepository::class)
 */
class ConcertInd
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
    private $titreConcertInd;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logoConcertInd;


    /**
     * @ORM\Column(type="text")
     */
    private $comConcertInd;

    /**
     * @ORM\OneToMany(targetEntity=ImgCi::class, mappedBy="concertInd")
     * @ORM\JoinColumn(nullable=true)
     */
    private $imgCi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgTmpConcertInd;


    public function __construct()
    {
        $this->imgCi = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreConcertInd(): ?string
    {
        return $this->titreConcertInd;
    }

    public function setTitreConcertInd(?string $titreConcertInd): self
    {
        $this->titreConcertInd = $titreConcertInd;

        return $this;
    }

    public function getLogoConcertInd(): ?string
    {
        return $this->logoConcertInd;
    }

    public function setLogoConcertInd(?string $logoConcertInd): self
    {
        $this->logoConcertInd = $logoConcertInd;

        return $this;
    }

    public function getComConcertInd(): ?string
    {
        return $this->comConcertInd;
    }

    public function setComConcertInd(?string $comConcertInd): self
    {
        $this->comConcertInd = $comConcertInd;

        return $this;
    }


    
    /**
     * @return Collection|ImgCi[]
     */
    public function getImgCi(): Collection
    {
        return $this->imgCi;
    }

    public function addImgCi(ImgCi $imgCi): self
    {
        if (!$this->imgCi->contains($imgCi)) {
            $this->imgCi[] = $imgCi;
            $imgCi->setConcertInd($this);
        }

        return $this;
    }

    public function removeImgCi(ImgCi $imgCi): self
    {
        if ($this->imgCi->removeElement($imgCi)) {
            // set the owning side to null (unless already changed)
            if ($imgCi->getConcertInd() === $this) {
                $imgCi->setConcertInd(null);
            }
        }

        return $this;
    }

    public function getImgTmpConcertInd(): ?string
    {
        return $this->imgTmpConcertInd;
    }

    public function setImgTmpConcertInd(?string $imgTmpConcertInd): self
    {
        $this->imgTmpConcertInd = $imgTmpConcertInd;

        return $this;
    }
}
