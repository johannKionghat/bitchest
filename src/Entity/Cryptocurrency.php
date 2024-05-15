<?php

namespace App\Entity;

use App\Repository\CryptocurrencyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CryptocurrencyRepository::class)]
class Cryptocurrency
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column]
    private ?int $CurrentPrice = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $Abreviation = null;

    #[ORM\ManyToOne(inversedBy: 'IdCryptocurrency')]
    private ?Wallet $IdWallet = null;

    #[ORM\Column]
    private ?int $soldeCrypto = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getCurrentPrice(): ?int
    {
        return $this->CurrentPrice;
    }

    public function setCurrentPrice(int $CurrentPrice): static
    {
        $this->CurrentPrice = $CurrentPrice;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getAbreviation(): ?string
    {
        return $this->Abreviation;
    }

    public function setAbreviation(string $Abreviation): static
    {
        $this->Abreviation = $Abreviation;

        return $this;
    }

    public function getIdWallet(): ?Wallet
    {
        return $this->IdWallet;
    }

    public function setIdWallet(?Wallet $IdWallet): static
    {
        $this->IdWallet = $IdWallet;

        return $this;
    }

    public function getSoldeCrypto(): ?int
    {
        return $this->soldeCrypto;
    }

    public function setSoldeCrypto(int $soldeCrypto): static
    {
        $this->soldeCrypto = $soldeCrypto;

        return $this;
    }
}