<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(normalizationContext={"groups"={"book"}})
 * @ORM\Entity(repositoryClass="App\Repository\OrderItemRepository")
 */
class OrderItem
{
    /**
     * @Groups("book")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups("book")
     * @ORM\ManyToOne(targetEntity="App\Entity\Carte", inversedBy="orderItems")
     */
    private $carte;

    /**
     * @Groups("book")
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @Groups("book")
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;

    /**
     * @Groups("book")
     * @ORM\ManyToOne(targetEntity="App\Entity\Commande", inversedBy="ligne_commande")
     */
    private $commande;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CarteDetail", mappedBy="orderitem")
     */
    private $carteDetails;

    /**
     * @Groups("book")
     * @ORM\Column(type="string", length=355, nullable=true)
     */
    private $code;

    /**
     * @Groups("book")
     * @ORM\Column(type="integer", nullable=true)
     */
    private $secretcode;

    public function __construct()
    {
        $this->carteDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarte(): ?carte
    {
        return $this->carte;
    }

    public function setCarte(?carte $carte): self
    {
        $this->carte = $carte;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }


    /**
     * @return Collection|CarteDetail[]
     */
    public function getCarteDetails(): Collection
    {
        return $this->carteDetails;
    }

    public function addCarteDetail(CarteDetail $carteDetail): self
    {
        if (!$this->carteDetails->contains($carteDetail)) {
            $this->carteDetails[] = $carteDetail;
            $carteDetail->setOrderitem($this);
        }

        return $this;
    }

    public function removeCarteDetail(CarteDetail $carteDetail): self
    {
        if ($this->carteDetails->contains($carteDetail)) {
            $this->carteDetails->removeElement($carteDetail);
            // set the owning side to null (unless already changed)
            if ($carteDetail->getOrderitem() === $this) {
                $carteDetail->setOrderitem(null);
            }
        }

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getSecretcode(): ?int
    {
        return $this->secretcode;
    }

    public function setSecretcode(?int $secretcode): self
    {
        $this->secretcode = $secretcode;

        return $this;
    }



}
