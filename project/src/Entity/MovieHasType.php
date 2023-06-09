<?php

namespace App\Entity;

use App\Repository\MovieHasTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieHasTypeRepository::class)]
class MovieHasType
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Movie::class, inversedBy: "movieHasTypes")]
    #[ORM\JoinColumn(nullable: false)]
    private ?Movie $movie = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Type::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $type = null;

    public function getMovie(): ?Movie
    {
        return $this->movie;
    }

    public function setMovie(?Movie $movie): self
    {
        $this->movie = $movie;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }
}
