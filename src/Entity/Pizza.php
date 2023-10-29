<?php

namespace App\Entity;

use App\Repository\PizzaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PizzaRepository::class)]
class Pizza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $ingredient = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'pizzas')]
    private Collection $PizzaOfUser;

    public function __construct()
    {
        $this->PizzaOfUser = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getIngredient(): ?string
    {
        return $this->ingredient;
    }

    public function setIngredient(string $ingredient): static
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getPizzaOfUser(): Collection
    {
        return $this->PizzaOfUser;
    }

    public function addPizzaOfUser(User $pizzaOfUser): static
    {
        if (!$this->PizzaOfUser->contains($pizzaOfUser)) {
            $this->PizzaOfUser->add($pizzaOfUser);
        }

        return $this;
    }

    public function removePizzaOfUser(User $pizzaOfUser): static
    {
        $this->PizzaOfUser->removeElement($pizzaOfUser);

        return $this;
    }
}
