<?php

namespace App\Entity;

use App\Repository\GoodsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GoodsRepository::class)
 */
class Goods
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="goods")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=OrdersGoods::class, mappedBy="goods")
     */
    private $ordersGoods;

    public function __construct()
    {
        $this->ordersGoods = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|OrdersGoods[]
     */
    public function getOrdersGoods(): Collection
    {
        return $this->ordersGoods;
    }

    public function addOrdersGood(OrdersGoods $ordersGood): self
    {
        if (!$this->ordersGoods->contains($ordersGood)) {
            $this->ordersGoods[] = $ordersGood;
            $ordersGood->setGoods($this);
        }

        return $this;
    }

    public function removeOrdersGood(OrdersGoods $ordersGood): self
    {
        if ($this->ordersGoods->contains($ordersGood)) {
            $this->ordersGoods->removeElement($ordersGood);
            // set the owning side to null (unless already changed)
            if ($ordersGood->getGoods() === $this) {
                $ordersGood->setGoods(null);
            }
        }

        return $this;
    }
}
