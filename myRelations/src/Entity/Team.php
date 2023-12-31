<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'team', targetEntity: Player::class, orphanRemoval: true)]
    private Collection $players;

    #[ORM\OneToMany(mappedBy: 'team_a', targetEntity: Game::class)]
    private Collection $games_a;

    #[ORM\OneToMany(mappedBy: 'team_b', targetEntity: Game::class)]
    private Collection $game_b;

    #[ORM\Column(length: 2, nullable: true, options: ['fixed'=> true])]
    private ?string $country = null;

    public function __construct()
    {
        $this->players = new ArrayCollection();
        $this->games_a = new ArrayCollection();
        $this->game_b = new ArrayCollection();
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

    /**
     * @return Collection<int, Player>
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function addPlayer(Player $player): self
    {
        if (!$this->players->contains($player)) {
            $this->players->add($player);
            $player->setTeam($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): self
    {
        if ($this->players->removeElement($player)) {
            // set the owning side to null (unless already changed)
            if ($player->getTeam() === $this) {
                $player->setTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Game>
     */
    public function getGamesA(): Collection
    {
        return $this->games_a;
    }

    public function addGamesA(Game $gamesA): self
    {
        if (!$this->games_a->contains($gamesA)) {
            $this->games_a->add($gamesA);
            $gamesA->setTeamA($this);
        }

        return $this;
    }

    public function removeGamesA(Game $gamesA): self
    {
        if ($this->games_a->removeElement($gamesA)) {
            // set the owning side to null (unless already changed)
            if ($gamesA->getTeamA() === $this) {
                $gamesA->setTeamA(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Game>
     */
    public function getGameB(): Collection
    {
        return $this->game_b;
    }

    public function addGameB(Game $gameB): self
    {
        if (!$this->game_b->contains($gameB)) {
            $this->game_b->add($gameB);
            $gameB->setTeamB($this);
        }

        return $this;
    }

    public function removeGameB(Game $gameB): self
    {
        if ($this->game_b->removeElement($gameB)) {
            // set the owning side to null (unless already changed)
            if ($gameB->getTeamB() === $this) {
                $gameB->setTeamB(null);
            }
        }

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    


    

    

}
