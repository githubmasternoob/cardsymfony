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
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"read", "write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read", "write"})
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderItem", mappedBy="commande")
     * @Groups({"read"})
     */
    private $ligne_commande;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"read", "write"})
     */
    private $total;

    public function __construct()
    {
        $this->ligne_commande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|OrderItem[]
     * @Groups({"read"})
     */
    public function getLigneCommande(): Collection
    {
        return $this->ligne_commande;
    }

    public function addLigneCommande(OrderItem $ligneCommande): self
    {
        if (!$this->ligne_commande->contains($ligneCommande)) {
            $this->ligne_commande[] = $ligneCommande;
            $ligneCommande->setCommande($this);
        }

        return $this;
    }

    public function removeLigneCommande(OrderItem $ligneCommande): self
    {
        if ($this->ligne_commande->contains($ligneCommande)) {
            $this->ligne_commande->removeElement($ligneCommande);
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getCommande() === $this) {
                $ligneCommande->setCommande(null);
            }
        }

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(?int $total): self
    {
        $this->total = $total;

        return $this;
    }

}
