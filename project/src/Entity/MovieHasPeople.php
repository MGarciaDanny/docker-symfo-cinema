<?php

namespace App\Entity;

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MovieHasPeopleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieHasPeopleRepository::class)]
class MovieHasPeople
{
    const SIGNIFICANCE = ['PRINCIPAL', 'SECONDAIRE'];

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Movie::class, inversedBy: "movieHasPeople")]
    #[ORM\JoinColumn(nullable: false)]
    private $movie;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: People::class, inversedBy: "movieHasPeople")]
    #[ORM\JoinColumn(nullable: false)]
    private $people;

    #[ORM\Column(type: "string", length: 255)]
    private $role;

    #[ORM\Column(nullable: true, columnDefinition: "enum('PRINCIPAL','SECONDAIRE')")]
    private ?string $significance = null;

    public function getMovie(): ?Movie
    {
        return $this->movie;
    }

    public function setMovie(?Movie $movie): self
    {
        $this->movie = $movie;

        return $this;
    }

    public function getPeople(): ?People
    {
        return $this->people;
    }

    public function setPeople(?People $people): self
    {
        $this->people = $people;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getSignificance(): ?string
    {
        return $this->significance;
    }

    public function setSignificance(?string $significance): self
    {
        $this->significance = $significance;

        return $this;
    }
}
