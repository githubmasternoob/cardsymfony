<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read","book"}},
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\CarteRepository")
 */
class Carte
{
    /**
     * @Groups({"read", "write"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"read", "write", "book"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @Groups({"read", "write", "book"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @Groups({"read", "write", "book"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photoName;

    /**
     * @Groups({"read", "write", "book"})
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $promotion;



    /**
     * @Groups({"read", "write", "book"})
     * @ORM\Column(type="float", nullable=true)
     */
    private $currentPrice;

    /**
     * @Groups({"read", "write", "book"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="Carte")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CartItem", mappedBy="carte")
     */
    private $cartItems;

    /**
     * @Groups({"read", "write", "book"})
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minvalue;

    /**
     * @Groups({"read", "write", "book"})
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maxvaluee;


    public function __construct()
    {
        $this->cartItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPhotoName(): ?string
    {
        return $this->photoName;
    }

    public function setPhotoName(?string $photoName): self
    {
        $this->photoName = $photoName;

        return $this;
    }



    public function getPromotion(): ?string
    {
        return $this->promotion;
    }

    public function setPromotion(?string $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }





    public function getCurrentPrice(): ?float
    {
        return $this->currentPrice;
    }

    public function setCurrentPrice(?float $currentPrice): self
    {
        $this->currentPrice = $currentPrice;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

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
            $cartItem->setCarte($this);
        }

        return $this;
    }

    public function removeCartItem(CartItem $cartItem): self
    {
        if ($this->cartItems->contains($cartItem)) {
            $this->cartItems->removeElement($cartItem);
            // set the owning side to null (unless already changed)
            if ($cartItem->getCarte() === $this) {
                $cartItem->setCarte(null);
            }
        }

        return $this;
    }

    public function getMinvalue(): ?int
    {
        return $this->minvalue;
    }

    public function setMinvalue(?int $minvalue): self
    {
        $this->minvalue = $minvalue;

        return $this;
    }

    public function getMaxvaluee(): ?int
    {
        return $this->maxvaluee;
    }

    public function setMaxvaluee(?int $maxvaluee): self
    {
        $this->maxvaluee = $maxvaluee;

        return $this;
    }




}
