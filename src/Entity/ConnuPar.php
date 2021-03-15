<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ConnuParRepository;

/**
 * @ORM\Entity(repositoryClass=ConnuParRepository::class)
 */
class ConnuPar
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
    private $nomConnuPar;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autreConnuPar;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomConnuPar(): ?string
    {
        return $this->nomConnuPar;
    }

    public function setNomConnuPar(?string $nomConnuPar): self
    {
        $this->nomConnuPar = $nomConnuPar;

        return $this;
    }



    public function getAutreConnuPar(): ?string
    {
        return $this->autreConnuPar;
    }

    public function setAutreConnuPar(?string $autreConnuPar): self
    {
        $this->autreConnuPar = $autreConnuPar;

        return $this;
    }




}
