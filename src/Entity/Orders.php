<?php

namespace App\Entity;

use App\Enum\OrderStatus;
use App\Enum\PaymentStatus;
use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersRepository::class)]
class Orders
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'integer')]
    private ?int $customer_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $order_date = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private string $shipping_address = '';

    #[ORM\Column(type: Types::STRING, length: 255)]
    private string $billing_address = '';

    #[ORM\Column(type: 'string', enumType: OrderStatus::class)]
    private ?OrderStatus $order_status = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private string $total_amount = '0.00';

    #[ORM\Column(type: Types::STRING, length: 255)]
    private string $payment_method = '';

    #[ORM\Column(type: 'string', enumType: PaymentStatus::class)]
    private ?PaymentStatus $payment_status = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private string $shipping_method = '';

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private string $shipping_cost = '0.00';

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $tracking_number = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private string $discounts = '0.00';

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private string $taxes = '0.00';

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $notes = null;

    #[ORM\OneToMany(mappedBy: 'order', targetEntity: OrderItems::class, cascade: ['persist', 'remove'])]
    private Collection $orderItems;

    public function __construct()
    {
        $this->orderItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerId(): ?int
    {
        return $this->customer_id;
    }

    public function setCustomerId(int $customer_id): static
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->order_date;
    }

    public function setOrderDate(\DateTimeInterface $order_date): static
    {
        $this->order_date = $order_date;

        return $this;
    }

    public function getShippingAddress(): string
    {
        return $this->shipping_address;
    }

    public function setShippingAddress(string $shipping_address): static
    {
        $this->shipping_address = $shipping_address;

        return $this;
    }

    public function getBillingAddress(): string
    {
        return $this->billing_address;
    }

    public function setBillingAddress(string $billing_address): static
    {
        $this->billing_address = $billing_address;

        return $this;
    }

    public function getOrderStatus(): ?OrderStatus
    {
        return $this->order_status;
    }

    public function setOrderStatus(OrderStatus $order_status): static
    {
        $this->order_status = $order_status;

        return $this;
    }

    public function getTotalAmount(): string
    {
        return $this->total_amount;
    }

    public function setTotalAmount(string $total_amount): static
    {
        $this->total_amount = $total_amount;

        return $this;
    }

    public function getPaymentMethod(): string
    {
        return $this->payment_method;
    }

    public function setPaymentMethod(string $payment_method): static
    {
        $this->payment_method = $payment_method;

        return $this;
    }

    public function getPaymentStatus(): ?PaymentStatus
    {
        return $this->payment_status;
    }

    public function setPaymentStatus(PaymentStatus $payment_status): static
    {
        $this->payment_status = $payment_status;

        return $this;
    }

    public function getShippingMethod(): string
    {
        return $this->shipping_method;
    }

    public function setShippingMethod(string $shipping_method): static
    {
        $this->shipping_method = $shipping_method;

        return $this;
    }

    public function getShippingCost(): string
    {
        return $this->shipping_cost;
    }

    public function setShippingCost(string $shipping_cost): static
    {
        $this->shipping_cost = $shipping_cost;

        return $this;
    }

    public function getTrackingNumber(): ?string
    {
        return $this->tracking_number;
    }

    public function setTrackingNumber(?string $tracking_number): static
    {
        $this->tracking_number = $tracking_number;

        return $this;
    }

    public function getDiscounts(): string
    {
        return $this->discounts;
    }

    public function setDiscounts(string $discounts): static
    {
        $this->discounts = $discounts;

        return $this;
    }

    public function getTaxes(): string
    {
        return $this->taxes;
    }

    public function setTaxes(string $taxes): static
    {
        $this->taxes = $taxes;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    public function getOrderItems(): Collection
    {
        return $this->orderItems;
    }

    public function addOrderItem(OrderItems $orderItem): static
    {
        if (!$this->orderItems->contains($orderItem)) {
            $this->orderItems->add($orderItem);
            $orderItem->setOrder($this);
        }

        return $this;
    }

    public function removeOrderItem(OrderItems $orderItem): static
    {
        if ($this->orderItems->removeElement($orderItem)) {
            if ($orderItem->getOrder() === $this) {
                $orderItem->setOrder(null);
            }
        }

        return $this;
    }
}
