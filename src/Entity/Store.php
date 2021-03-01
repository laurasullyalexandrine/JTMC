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
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $storeActivity;

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
     * @ORM\Column(type="integer")
     */
    private $roadNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

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
     * @ORM\ManyToMany(targetEntity=OpenDays::class, inversedBy="store")
     */
    private $openDays;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $openHours;

    /**
     * @ORM\Column(type="string", length=1000)
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
    private $user;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=8, nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=8, nullable=true)
     */
    private $longitude;


    public function __construct()
    {
        $this->InformationPayment = new ArrayCollection();
        $this->CommercialService = new ArrayCollection();
        $this->openDays = new ArrayCollection();
    }

    public function __toString() 
    {
        return $this->name;
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStoreActivity(): ?string
    {
        return $this->storeActivity;
    }

    public function setStoreActivity(string $storeActivity): self
    {
        $this->storeActivity = $storeActivity;

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

    public function getRoadNumber(): ?int
    {
        return $this->roadNumber;
    }

    public function setRoadNumber(int $roadNumber): self
    {
        $this->roadNumber = $roadNumber;

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

    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }

    public function setPostalCode(int $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

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


    public function getOpenHours(): ?string
    {
        return $this->openHours;
    }

    public function setOpenHours(string $openHours): self
    {
        $this->openHours = $openHours;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        
        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

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

    /**
     * @return Collection|OpenDays[]
     */
    public function getOpenDays(): Collection
    {
        return $this->openDays;
    }

    public function addOpenDay(OpenDays $openDay): self
    {
        if (!$this->openDays->contains($openDay)) {
            $this->openDays[] = $openDay;
            $openDay->addStore($this);
        }

        return $this;
    }

    public function removeOpenDay(OpenDays $openDay): self
    {
        if ($this->openDays->removeElement($openDay)) {
            $openDay->removeStore($this);
        }

        return $this;
    }

}