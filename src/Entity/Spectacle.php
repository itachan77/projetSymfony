<?php

namespace App\Entity;

use App\Repository\SpectacleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpectacleRepository::class)
 */
class Spectacle
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
    private $titreSpectacle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logoSpectacle;



    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreSpectacle(): ?string
    {
        return $this->titreSpectacle;
    }

    public function setTitreSpectacle(?string $titreSpectacle): self
    {
        $this->titreSpectacle = $titreSpectacle;

        return $this;
    }

    public function getLogoSpectacle(): ?string
    {
        return $this->logoSpectacle;
    }

    public function setLogoSpectacle(?string $logoSpectacle): self
    {
        $this->logoSpectacle = $logoSpectacle;

        return $this;
    }
}
