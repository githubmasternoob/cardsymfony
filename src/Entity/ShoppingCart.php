<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}},
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ShoppingCartRepository")
 */
class ShoppingCart
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"read", "write", "book"})
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"read", "write", "book"})
     */
    private $TotalCost;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"read", "write", "book"})
     */
    private $Validity;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CartItem", mappedBy="shoppingcart")
     * @Groups({"read"})
     */
    private $cartItems;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     * @Groups({"read", "write"})
     */
    private $user;


    public function __construct()
    {
        $this->cartItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotalCost(): ?int
    {
        return $this->TotalCost;
    }

    public function setTotalCost(int $TotalCost): self
    {
        $this->TotalCost = $TotalCost;

        return $this;
    }

    public function getValidity(): ?int
    {
        return $this->Validity;
    }

    public function setValidity(int $Validity): self
    {
        $this->Validity = $Validity;

        return $this;
    }

    /**
     * @return Collection|CartItem[]
     */
    public function getCartItems(): Collection
    {
        return $this->cartItems;
    }

    public function addCartItem(CartItem $cartItem): self
    {
        if (!$this->cartItems->contains($cartItem)) {
            $this->cartItems[] = $cartItem;
            $cartItem->setShoppingcart($this);
        }

        return $this;
    }

    public function removeCartItem(CartItem $cartItem): self
    {
        if ($this->cartItems->contains($cartItem)) {
            $this->cartItems->removeElement($cartItem);
            // set the owning side to null (unless already changed)
            if ($cartItem->getShoppingcart() === $this) {
                $cartItem->setShoppingcart(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
