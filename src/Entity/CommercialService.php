<?php

namespace App\Entity;

use App\Repository\CommercialServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ManyToMany(targetEntity=Store::class, mappedBy="CommercialService")
     */
    private $stores;

    /**
     * @ORM\Column(type="array")
     */
    private $servicetypes = [];

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
            $store->addCommercialService($this);
        }

        return $this;
    }

    public function removeStore(Store $store): self
    {
        if ($this->stores->removeElement($store)) {
            $store->removeCommercialService($this);
        }

        return $this;
    }

    public function getServicetypes(): ?array
    {
        return $this->servicetypes;
    }

    public function setServicetypes(array $servicetypes): self
    {
        $this->servicetypes = $servicetypes;

        return $this;
    }
}
