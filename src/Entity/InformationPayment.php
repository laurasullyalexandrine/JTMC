<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=InformationPaymentRepository::class)
 */
class InformationPayment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @ORM\Column(type="string", length=255)
    * @Assert\NotBlank()
    */
    private $payment_types;

    /**
     * @ORM\ManyToMany(targetEntity=Store::class, mappedBy="InformationPayment")
     */
    private $stores;


    public function __construct()
    {
        $this->stores = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->payment_types;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaymentTypes(): ?string
    {
        return $this->payment_types;
    }

    public function setPaymenTypes(string $payment_types): self
    {
        $this->payment_types = $payment_types;

        return $this;
    }

    /**
     * @return Collection|Store[]
     */
    public function getStores(): Collection
    {
        return $this->stores;
    }

    public function addStore(Store $store): self
    {
        if (!$this->stores->contains($store)) {
            $this->stores[] = $store;
            $store->addInformationPayment($this);
        }

        return $this;
    }

    public function removeStore(Store $store): self
    {
        if ($this->stores->removeElement($store)) {
            $store->removeInformationPayment($this);
        }

        return $this;
    }
}