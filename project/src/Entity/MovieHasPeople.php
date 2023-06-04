<?php

namespace App\Entity;

use App\Repository\MovieHasPeopleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieHasPeopleRepository::class)]
class MovieHasPeople
{
    const SIGNIFICANCE = ['PRINCIPAL', 'SECONDAIRE'];

    #[ORM\Id]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Movie $movie = null;

    #[ORM\Id]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?People $people = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

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
