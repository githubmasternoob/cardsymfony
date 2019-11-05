<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photoName;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Carte", mappedBy="category")
     */
    private $Carte;

    public function __construct()
    {
        $this->Carte = new ArrayCollection();
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

    /**
     * @return Collection|Carte[]
     */
    public function getCarte(): Collection
    {
        return $this->Carte;
    }

    public function addCarte(Carte $carte): self
    {
        if (!$this->Carte->contains($carte)) {
            $this->Carte[] = $carte;
            $carte->setCategory($this);
        }

        return $this;
    }

    public function removeCarte(Carte $carte): self
    {
        if ($this->Carte->contains($carte)) {
            $this->Carte->removeElement($carte);
            // set the owning side to null (unless already changed)
            if ($carte->getCategory() === $this) {
                $carte->setCategory(null);
            }
        }

        return $this;
    }
}
