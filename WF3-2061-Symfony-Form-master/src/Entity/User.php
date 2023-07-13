<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $firstname = null;

    #[ORM\Column(length: 40)]
    private ?string $lastname = null;

    #[ORM\ManyToOne(cascade: ['persist'])]
    private ?Address $address_1 = null;

    #[ORM\ManyToOne(cascade: ['persist'])]
    private ?Address $address_2 = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getAddress1(): ?Address
    {
        return $this->address_1;
    }

    public function setAddress1(?Address $address_1): self
    {
        $this->address_1 = $address_1;

        return $this;
    }

    public function getAddress2(): ?Address
    {
        return $this->address_2;
    }

    public function setAddress2(?Address $address_2): self
    {
        $this->address_2 = $address_2;

        return $this;
    }
}
