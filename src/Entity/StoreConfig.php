<?php

namespace App\Entity;

use App\Repository\StoreConfigRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StoreConfigRepository::class)]
class StoreConfig
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cssSelector = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $selectorType = null;

    #[ORM\Column(length: 255)]
    private ?string $store = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSelectorType(): ?string
    {
        return $this->selectorType;
    }

    public function setSelectorType(?string $selectorType): self
    {
        $this->selectorType = $selectorType;

        return $this;
    }

    public function getStore(): ?string
    {
        return $this->store;
    }

    public function setStore(string $store): self
    {
        $this->store = $store;

        return $this;
    }
}
