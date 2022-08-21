<?php

namespace App\Entity;

use App\Repository\ProductUrlRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductUrlRepository::class)]
class ProductUrl
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $storeId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $caliber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $oldPrice = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cssSelector = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStoreId(): ?int
    {
        return $this->storeId;
    }

    public function setStoreId(?int $storeId): self
    {
        $this->storeId = $storeId;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCaliber(): ?string
    {
        return $this->caliber;
    }

    public function setCaliber(?string $caliber): self
    {
        $this->caliber = $caliber;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getOldPrice(): ?string
    {
        return $this->oldPrice;
    }

    public function setOldPrice(?string $oldPrice): self
    {
        $this->oldPrice = $oldPrice;

        return $this;
    }

    public function getCssSelector(): ?string
    {
        return $this->cssSelector;
    }

    public function setCssSelector(?string $cssSelector): self
    {
        $this->cssSelector = $cssSelector;

        return $this;
    }
}
