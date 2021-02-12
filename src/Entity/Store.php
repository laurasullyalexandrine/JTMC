<?php

namespace App\Entity;

use App\Repository\StoreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StoreRepository::class)
 */
class Store
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $store_activity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $siret;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     */
    private $road_number;

    /**
     * @ORM\Column(type="integer")
     */
    private $postal_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(type="json")
     */
    private $open_days = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $open_hours;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=InformationPayment::class, inversedBy="stores")
     */
    private $InformationPayment;

    /**
     * @ORM\ManyToMany(targetEntity=CommercialService::class, inversedBy="stores")
     */
    private $CommercialService;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="stores")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    public function __construct()
    {
        $this->InformationPayment = new ArrayCollection();
        $this->CommercialService = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStoreActivity(): ?string
    {
        return $this->store_activity;
    }

    public function setStoreActivity(string $store_activity): self
    {
        $this->store_activity = $store_activity;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
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

    public function getSiret(): ?int
    {
        return $this->siret;
    }

    public function setSiret(int $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getRoadNumber(): ?int
    {
        return $this->road_number;
    }

    public function setRoadNumber(int $road_number): self
    {
        $this->road_number = $road_number;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postal_code;
    }

    public function setPostalCode(int $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getOpenDays(): ?array
    {
        return $this->open_days;
    }

    public function setOpenDays(array $open_days): self
    {
        $this->open_days = $open_days;

        return $this;
    }

    public function getOpenHours(): ?int
    {
        return $this->open_hours;
    }

    public function setOpenHours(int $open_hours): self
    {
        $this->open_hours = $open_hours;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|InformationPayment[]
     */
    public function getInformationPayment(): Collection
    {
        return $this->InformationPayment;
    }

    public function addInformationPayment(InformationPayment $informationPayment): self
    {
        if (!$this->InformationPayment->contains($informationPayment)) {
            $this->InformationPayment[] = $informationPayment;
        }

        return $this;
    }

    public function removeInformationPayment(InformationPayment $informationPayment): self
    {
        $this->InformationPayment->removeElement($informationPayment);

        return $this;
    }

    /**
     * @return Collection|CommercialService[]
     */
    public function getCommercialService(): Collection
    {
        return $this->CommercialService;
    }

    public function addCommercialService(CommercialService $commercialService): self
    {
        if (!$this->CommercialService->contains($commercialService)) {
            $this->CommercialService[] = $commercialService;
        }

        return $this;
    }

    public function removeCommercialService(CommercialService $commercialService): self
    {
        $this->CommercialService->removeElement($commercialService);

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
