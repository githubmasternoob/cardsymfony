<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     collectionOperations={
 *      "get","post",
 *      "collName_api_me3"={"route_name"="api_me3"}
 *  }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\CarteDetailRepository")
 */
class CarteDetail
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $currentprice;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\OrderItem", inversedBy="carteDetails")
     */
    private $orderitem;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $withdraw;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrentprice(): ?int
    {
        return $this->currentprice;
    }

    public function setCurrentprice(?int $currentprice): self
    {
        $this->currentprice = $currentprice;

        return $this;
    }



  

    public function getOrderitem(): ?OrderItem
    {
        return $this->orderitem;
    }

    public function setOrderitem(?OrderItem $orderitem): self
    {
        $this->orderitem = $orderitem;

        return $this;
    }

    public function getWithdraw(): ?int
    {
        return $this->withdraw;
    }

    public function setWithdraw(?int $withdraw): self
    {
        $this->withdraw = $withdraw;

        return $this;
    }

}
