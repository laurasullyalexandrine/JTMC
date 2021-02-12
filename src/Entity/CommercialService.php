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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $relais_colis;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $mondial_relais;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $click_and_collect;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $too_good_to_go;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $delivery;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $to_take_away;

    /**
     * @ORM\ManyToMany(targetEntity=Store::class, mappedBy="CommercialService")
     */
    private $stores;

    public function __construct()
    {
        $this->stores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRelaisColis(): ?bool
    {
        return $this->relais_colis;
    }

    public function setRelaisColis(?bool $relais_colis): self
    {
        $this->relais_colis = $relais_colis;

        return $this;
    }

    public function getMondialRelais(): ?bool
    {
        return $this->mondial_relais;
    }

    public function setMondialRelais(?bool $mondial_relais): self
    {
        $this->mondial_relais = $mondial_relais;

        return $this;
    }

    public function getClickAndCollect(): ?bool
    {
        return $this->click_and_collect;
    }

    public function setClickAndCollect(?bool $click_and_collect): self
    {
        $this->click_and_collect = $click_and_collect;

        return $this;
    }

    public function getTooGoodToGo(): ?bool
    {
        return $this->too_good_to_go;
    }

    public function setTooGoodToGo(?bool $too_good_to_go): self
    {
        $this->too_good_to_go = $too_good_to_go;

        return $this;
    }

    public function getDelivery(): ?bool
    {
        return $this->delivery;
    }

    public function setDelivery(?bool $delivery): self
    {
        $this->delivery = $delivery;

        return $this;
    }

    public function getToTakeAway(): ?bool
    {
        return $this->to_take_away;
    }

    public function setToTakeAway(?bool $to_take_away): self
    {
        $this->to_take_away = $to_take_away;

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
        if ($this->stores->removeElement($store)) {
            $store->removeCommercialService($this);
        }

        return $this;
    }
}
