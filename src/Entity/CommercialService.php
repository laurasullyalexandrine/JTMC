<?php

namespace App\Entity;

use App\Repository\CommercialServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CommercialServiceRepository::class)
 */
class CommercialService
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
    private $serviceTypes;

    /**
     * @ORM\ManyToMany(targetEntity=Store::class, mappedBy="CommercialService")
     */
    private $stores;

    public function __construct()
    {
        $this->stores = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->serviceTypes;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServiceTypes(): ?string
    {
        return $this->serviceTypes;
    }

    public function setServiceTypes(string $serviceTypes): self
    {
        $this->serviceTypes = $serviceTypes;

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
            $store->addCommercialService($this);
        }

        return $this;
    }

    public function removeStore(Store $store): self
    {
        if ($this->stores->contains($store)) {
            $this->stores->removeElement($store);
            $store->removeCommercialService($this);
        }

        return $this;
    }
}