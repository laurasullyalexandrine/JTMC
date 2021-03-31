<?php

namespace App\Entity;

use App\Repository\OpenDaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=OpenDaysRepository::class)
 */
class OpenDays
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
    private $days;

    /**
     * @ORM\ManyToMany(targetEntity=Store::class, mappedBy="openDays")
     */
    private $Store;

    public function __construct()
    {
        $this->Store = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->days;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDays(): ?string
    {
        return $this->days;
    }

    public function setDays(string $days): self
    {
        $this->days = $days;

        return $this;
    }

    /**
     * @return Collection|Store[]
     */
    public function getStore(): Collection
    {
        return $this->Store;
    }

    public function addStore(Store $store): self
    {
        if (!$this->Store->contains($store)) {
            $this->Store[] = $store;
        }

        return $this;
    }

    public function removeStore(Store $store): self
    {
        $this->Store->removeElement($store);

        return $this;
    }
}
