<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdersRepository::class)
 */
class Orders
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $order_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=OrdersGoods::class, mappedBy="order_number")
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

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getOrderNumber(): ?int
    {
        return $this->order_number;
    }

    public function setOrderNumber(int $order_number): self
    {
        $this->order_number = $order_number;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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
            $ordersGood->setOrderId($this);
        }

        return $this;
    }

    public function removeOrdersGood(OrdersGoods $ordersGood): self
    {
        if ($this->ordersGoods->contains($ordersGood)) {
            $this->ordersGoods->removeElement($ordersGood);
            // set the owning side to null (unless already changed)
            if ($ordersGood->getOrderId() === $this) {
                $ordersGood->setOrderId(null);
            }
        }

        return $this;
    }
}
