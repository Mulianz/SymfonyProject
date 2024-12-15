<?php

// src/Entity/Film.php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $duree = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $noteGenerale = null;

    // Ajout de la propriété studioFilm
    #[ORM\Column(length: 255)]
    private ?string $studioFilm = null;

    #[ORM\ManyToMany(targetEntity: Personnages::class, mappedBy: 'films')]
    private Collection $personnages;
    #[ORM\Column(type: "text", nullable: false)]
private ?string $bio = null;

public function getBio(): ?string
{
    return $this->bio;
}

public function setBio(string $bio): self
{
    $this->bio = $bio;
    return $this;
}

    public function __construct()
    {
        $this->personnages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;
        return $this;
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

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): static
    {
        $this->duree = $duree;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getNoteGenerale(): ?float
    {
        return $this->noteGenerale;
    }

    public function setNoteGenerale(float $noteGenerale): static
    {
        $this->noteGenerale = $noteGenerale;
        return $this;
    }

    public function getPersonnages(): Collection
    {
        return $this->personnages;
    }

    public function addPersonnage(Personnages $personnage): self
    {
        if (!$this->personnages->contains($personnage)) {
            $this->personnages->add($personnage);
            $personnage->addFilm($this);
        }

        return $this;
    }

    public function removePersonnage(Personnages $personnage): self
    {
        if ($this->personnages->removeElement($personnage)) {
            $personnage->removeFilm($this);
        }

        return $this;
    }
}

