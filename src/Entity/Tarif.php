<?php

namespace App\Entity;

use App\Repository\TarifRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TarifRepository::class)
 */
class Tarif
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $nb_1tarif;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $nb_2tarif;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $nb_3tarif;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $nb_4tarif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNb1tarif(): ?float
    {
        return $this->nb_1tarif;
    }

    public function setNb1tarif(?float $nb_1tarif): self
    {
        $this->nb_1tarif = $nb_1tarif;

        return $this;
    }

    public function getNb2tarif(): ?float
    {
        return $this->nb_2tarif;
    }

    public function setNb2tarif(?float $nb_2tarif): self
    {
        $this->nb_2tarif = $nb_2tarif;

        return $this;
    }

    public function getNb3tarif(): ?float
    {
        return $this->nb_3tarif;
    }

    public function setNb3tarif(?float $nb_3tarif): self
    {
        $this->nb_3tarif = $nb_3tarif;

        return $this;
    }

    public function getNb4tarif(): ?float
    {
        return $this->nb_4tarif;
    }

    public function setNb4tarif(?float $nb_4tarif): self
    {
        $this->nb_4tarif = $nb_4tarif;

        return $this;
    }
}
