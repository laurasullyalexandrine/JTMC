<?php

namespace App\Entity;

use App\Repository\InformationPaymentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ManyToMany(targetEntity=Store::class, mappedBy="InformationPayment")
     */
    private $stores;

   /**
    * @ORM\Column(type="array")
    */
    private $paymentTypes = [];

    public function __construct()
    {
        $this->stores = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
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

    public function getPaymentTypes(): ?array
    {
        return $this->paymentTypes;
    }

    public function setPaymentTypes(array $paymentTypes): self
    {
        $this->paymentTypes = $paymentTypes;

        return $this;
    }
}