<?php

namespace App\Entity;

use App\Repository\ConcertGpRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcertGpRepository::class)
 */
class ConcertGp
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
    private $titreConcertGp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logoConcertGp;


    /**
     * @ORM\Column(type="text")
     */
    private $comConcertGp;

    /**
     * @ORM\OneToMany(targetEntity=ImgGp::class, mappedBy="concertGp")
     */
    private $imgGp;

    
    public function __construct()
    {
        $this->imgGp = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreConcertGp(): ?string
    {
        return $this->titreConcertGp;
    }

    public function setTitreConcertGp(?string $titreConcertGp): self
    {
        $this->titreConcertGp = $titreConcertGp;

        return $this;
    }

    public function getLogoConcertGp(): ?string
    {
        return $this->logoConcertGp;
    }

    public function setLogoConcertGp(?string $logoConcertGp): self
    {
        $this->logoConcertGp = $logoConcertGp;

        return $this;
    }


    public function getComConcertGp(): ?string
    {
        return $this->comConcertGp;
    }

    public function setComConcertGp(string $comConcertGp): self
    {
        $this->comConcertGp = $comConcertGp;

        return $this;
    }

    /**
     * @return Collection|ImgGp[]
     */
    public function getImgGp(): Collection
    {
        return $this->imgGp;
    }

    public function addImgGp(ImgGp $imgGp): self
    {
        if (!$this->imgGp->contains($imgGp)) {
            $this->imgGp[] = $imgGp;
            $imgGp->setConcertGp($this);
        }

        return $this;
    }

    public function removeImgGp(ImgGp $imgGp): self
    {
        if ($this->imgGp->removeElement($imgGp)) {
            // set the owning side to null (unless already changed)
            if ($imgGp->getConcertGp() === $this) {
                $imgGp->setConcertGp(null);
            }
        }

        return $this;
    }
}
