<?php

namespace App\Entity;

use App\Repository\OrdersGoodsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdersGoodsRepository::class)
 */
class OrdersGoods
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Orders::class, inversedBy="ordersGoods")
     * @ORM\JoinColumn(nullable=false)
     */
    private $order_number;

    /**
     * @ORM\ManyToOne(targetEntity=Goods::class, inversedBy="ordersGoods")
     * @ORM\JoinColumn(nullable=false)
     */
    private $goods;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderNumber(): ?Orders
    {
        return $this->order_number;
    }

    public function setOrderNumber(?Orders $order_number): self
    {
        $this->order_number = $order_number;

        return $this;
    }

    public function getGoods(): ?Goods
    {
        return $this->goods;
    }

    public function setGoods(?Goods $goods): self
    {
        $this->goods = $goods;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
