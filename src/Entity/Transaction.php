<?php

namespace Banpagi\Trading212\Entity;

class Transaction extends AbstractDataRecord
{
    private string $id = '';  // Only filled with transactions
    private int $side = 1;
    private float $profit = 0.0;
    private string $currencyProfit = '';

    /**
     * Get the value of id
     *
     * @return  string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param   string  $id
     *
     * @return  self
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of side
     *
     * @return  int
     */
    public function getSide(): int
    {
        return $this->side;
    }

    /**
     * Set the value of side
     *
     * @param   int  $side
     *
     * @return  self
     */
    public function setSide(int $side): self
    {
        $this->side = $side;

        return $this;
    }

    /**
     * Get the value of profit
     *
     * @return  float
     */
    public function getProfit(): float
    {
        return $this->profit;
    }

    /**
     * Set the value of profit
     *
     * @param   float  $profit
     *
     * @return  self
     */
    public function setProfit(float $profit): self
    {
        $this->profit = $profit;

        return $this;
    }

    /**
     * Get the value of currencyProfit
     *
     * @return  string
     */
    public function getCurrencyProfit(): string
    {
        return $this->currencyProfit;
    }

    /**
     * Set the value of currencyProfit
     *
     * @param   string  $currencyProfit
     *
     * @return  self
     */
    public function setCurrencyProfit(string $currencyProfit): self
    {
        $this->currencyProfit = $currencyProfit;

        return $this;
    }
}
