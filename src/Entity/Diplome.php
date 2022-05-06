<?php

namespace App\Entity;

use App\Repository\DiplomeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiplomeRepository::class)
 */
class Diplome
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ville::class, inversedBy="diplomes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity=Univ::class, inversedBy="diplomes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Univ;

    /**
     * @ORM\ManyToOne(targetEntity=Intitule::class, inversedBy="diplomes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Intitule;

    /**
     * @ORM\ManyToOne(targetEntity=BUT::class, inversedBy="diplomes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $BUT;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVille(): ?ville
    {
        return $this->ville;
    }

    public function setVille(?ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getUniv(): ?Univ
    {
        return $this->Univ;
    }

    public function setUniv(?Univ $Univ): self
    {
        $this->Univ = $Univ;

        return $this;
    }

    public function getIntitule(): ?Intitule
    {
        return $this->Intitule;
    }

    public function setIntitule(?Intitule $Intitule): self
    {
        $this->Intitule = $Intitule;

        return $this;
    }

    public function getBUT(): ?BUT
    {
        return $this->BUT;
    }

    public function setBUT(?BUT $BUT): self
    {
        $this->BUT = $BUT;

        return $this;
    }
}
