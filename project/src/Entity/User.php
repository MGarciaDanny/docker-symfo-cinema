<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity('email', 'Email déjà existant.')]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
#[ApiResource(normalizationContext: ['groups' => ['UserGroup']])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('UserGroup')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups('UserGroup')]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups('UserGroup')]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    #[Groups('UserGroup')]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    #[Groups('UserGroup')]
    private ?string $roles = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups('UserGroup')]
    private ?\DateTimeInterface $created_at = null;

    public function __construct()
    {
        $this->created_at = new \DateTime();
        $this->roles = 'ROLE_USER';
    }

    public function getSalt()
    {
    }

    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

    public function eraseCredentials(): void
    {
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }
}
