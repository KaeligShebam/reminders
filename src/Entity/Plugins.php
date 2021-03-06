<?php

namespace App\Entity;

use App\Repository\PluginsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PluginsRepository::class)
 */
class Plugins
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=75)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $link;

    /**
     * @ORM\Column(type="datetime")
     */
    private $purchaseddate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $customer;

    /**
     * @ORM\Column(type="datetime")
     */
    private $expirationdate;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $cms;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getPurchaseddate(): ?\DateTimeInterface
    {
        return $this->purchaseddate;
    }

    public function setPurchaseddate(\DateTimeInterface $purchaseddate): self
    {
        $this->purchaseddate = $purchaseddate;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

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

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getExpirationdate(): ?\DateTimeInterface
    {
        return $this->expirationdate;
    }

    public function setExpirationdate(\DateTimeInterface $expirationdate): self
    {
        $this->expirationdate = $expirationdate;

        return $this;
    }

    public function getCms(): ?string
    {
        return $this->cms;
    }

    public function setCms(string $cms): self
    {
        $this->cms = $cms;

        return $this;
    }

}
