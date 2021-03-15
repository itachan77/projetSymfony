<?php

namespace App\Entity;

use App\Repository\SlidesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SlidesRepository::class)
 */
class Slides
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $fichierSlide;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFichierSlide(): ?string
    {
        return $this->fichierSlide;
    }

    public function setFichierSlide(?string $fichierSlide): self
    {
        $this->fichierSlide = $fichierSlide;

        return $this;
    }
}
