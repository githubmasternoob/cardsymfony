<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(normalizationContext={"groups"={"book"}})
 * @ORM\Entity(repositoryClass="App\Repository\CartItemRepository")
 */
class CartItem
{
    /**
     * @Groups("book")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @Groups({"book"})
     * @ORM\ManyToOne(targetEntity="App\Entity\ShoppingCart", inversedBy="cartItems")
     */
    private $shoppingcart;

    /**
     * @Groups({"book"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Carte", inversedBy="cartItems")
     */
    private $carte;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price;

    /**
     * @Groups({"book"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fileName;

    /**
     * @Groups({"book"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mail;


    public function __construct()
    {
        $this->Carte = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getShoppingcart(): ?ShoppingCart
    {
        return $this->shoppingcart;
    }

    public function setShoppingcart(?ShoppingCart $shoppingcart): self
    {
        $this->shoppingcart = $shoppingcart;

        return $this;
    }

    public function getCarte(): ?Carte
    {
        return $this->carte;
    }

    public function setCarte(?Carte $carte): self
    {
        $this->carte = $carte;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(?string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }



}
