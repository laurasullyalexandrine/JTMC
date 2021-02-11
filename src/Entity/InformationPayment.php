<?php

namespace App\Entity;

use App\Repository\InformationPaymentRepository;
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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $card_bank;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $american_express;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cash;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cheque;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $gift_card;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $luncheon_voucher;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ancv_vacation_check;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $table_check;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $restaurant_voucher_sodexo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCardBank(): ?bool
    {
        return $this->card_bank;
    }

    public function setCardBank(?bool $card_bank): self
    {
        $this->card_bank = $card_bank;

        return $this;
    }

    public function getAmericanExpress(): ?bool
    {
        return $this->american_express;
    }

    public function setAmericanExpress(?bool $american_express): self
    {
        $this->american_express = $american_express;

        return $this;
    }

    public function getCash(): ?bool
    {
        return $this->cash;
    }

    public function setCash(bool $cash): self
    {
        $this->cash = $cash;

        return $this;
    }

    public function getCheque(): ?bool
    {
        return $this->cheque;
    }

    public function setCheque(?bool $cheque): self
    {
        $this->cheque = $cheque;

        return $this;
    }

    public function getGiftCard(): ?bool
    {
        return $this->gift_card;
    }

    public function setGiftCard(?bool $gift_card): self
    {
        $this->gift_card = $gift_card;

        return $this;
    }

    public function getLuncheonVoucher(): ?bool
    {
        return $this->luncheon_voucher;
    }

    public function setLuncheonVoucher(?bool $luncheon_voucher): self
    {
        $this->luncheon_voucher = $luncheon_voucher;

        return $this;
    }

    public function getAncvVacationCheck(): ?bool
    {
        return $this->ancv_vacation_check;
    }

    public function setAncvVacationCheck(?bool $ancv_vacation_check): self
    {
        $this->ancv_vacation_check = $ancv_vacation_check;

        return $this;
    }

    public function getTableCheck(): ?bool
    {
        return $this->table_check;
    }

    public function setTableCheck(?bool $table_check): self
    {
        $this->table_check = $table_check;

        return $this;
    }

    public function getRestaurantVoucherSodexo(): ?bool
    {
        return $this->restaurant_voucher_sodexo;
    }

    public function setRestaurantVoucherSodexo(?bool $restaurant_voucher_sodexo): self
    {
        $this->restaurant_voucher_sodexo = $restaurant_voucher_sodexo;

        return $this;
    }
}
