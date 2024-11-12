<?php

namespace App\Entity;

use App\Repository\PersonnagesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnagesRepository::class)]
class Personnages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $films = null;

    #[ORM\Column(length: 255)]
    private ?string $imagePersonnage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getFilms(): ?string
    {
        return $this->films;
    }

    public function setFilms(string $films): static
    {
        $this->films = $films;

        return $this;
    }

    public function getImagePersonnage(): ?string
    {
        return $this->imagePersonnage;
    }

    public function setImagePersonnage(string $imagePersonnage): static
    {
        $this->imagePersonnage = $imagePersonnage;

        return $this;
    }
}
