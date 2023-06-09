<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\MovieHasPeople;

#[ORM\Entity(repositoryClass: MovieRepository::class)]
#[ApiResource]
class Movie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $duration = null;

    #[ORM\Column(type: "string", length: 511, nullable: true)]
    private $picture;

    #[ORM\OneToMany(mappedBy: "movie", targetEntity: MovieHasPeople::class)]
    private $movieHasPeople;

    #[ORM\OneToMany(mappedBy: "movie", targetEntity: MovieHasType::class)]
    private $movieHasType;

    public function __construct()
    {
        $this->movieHasPeople = new ArrayCollection();
        $this->movieHasType = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection|MovieHasType[]
     */
    public function getMovieHasPeople(): Collection
    {
        return $this->movieHasPeople;
    }

    public function addMovieHasPeople(MovieHasPeople $movieHasPeople): self
    {
        if (!$this->movieHasPeople->contains($movieHasPeople)) {
            $this->movieHasPeople[] = $movieHasPeople;
            $movieHasPeople->setMovie($this);
        }

        return $this;
    }

    public function removeMovieHasPeople(MovieHasPeople $movieHasPeople): self
    {
        if ($this->movieHasPeople->contains($movieHasPeople)) {
            $this->movieHasPeople->removeElement($movieHasPeople);
            // set the owning side to null (unless already changed)
            if ($movieHasPeople->getMovie() === $this) {
                $movieHasPeople->setMovie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MovieHasType[]
     */
    public function getMovieHasType(): Collection
    {
        return $this->movieHasType;
    }

    public function addMovieHasType(MovieHasType $movieHasType): self
    {
        if (!$this->movieHasType->contains($movieHasType)) {
            $this->movieHasType[] = $movieHasType;
            $movieHasType->setMovie($this);
        }

        return $this;
    }

    public function removeMovieHasType(MovieHasType $movieHasType): self
    {
        if ($this->movieHasType->contains($movieHasType)) {
            $this->movieHasType->removeElement($movieHasType);
            // set the owning side to null (unless already changed)
            if ($movieHasType->getMovie() === $this) {
                $movieHasType->setMovie(null);
            }
        }

        return $this;
    }
}
