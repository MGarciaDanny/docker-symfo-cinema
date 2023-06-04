<?php

namespace App\Entity;

use App\Repository\MovieHasPeopleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieHasPeopleRepository::class)]
class MovieHasPeople
{
    const SIGNIFIANCE = ['PRINCIPAL', 'SECONDAIRE'];

    #[ORM\Id]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Movie $movie = null;

    #[ORM\Id]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?People $people = null;

    #[ORM\Column(nullable: true, columnDefinition: "enum('PRINCIPAL','SECONDAIRE')")]
    private ?string $signifiance = null;

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

    public function getSignifiance(): ?string
    {
        return $this->signifiance;
    }

    public function setSignifiance(?string $signifiance): self
    {
        $this->signifiance = $signifiance;

        return $this;
    }
}
