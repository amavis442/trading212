<?php declare(strict_types=1);

namespace Banpagi\Trading212\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class DataRecords
{
    private ArrayCollection $dividend;
    private ArrayCollection $lending;
    private ArrayCollection $transaction;
    private ArrayCollection $interest;
    private ArrayCollection $withdraw;
    private ArrayCollection $deposit;
    private int $lines = 0;

    public function __construct()
    {
        $this->dividend = new ArrayCollection();
        $this->lending = new ArrayCollection();
        $this->transaction = new ArrayCollection();
        $this->interest = new ArrayCollection();
        $this->withdraw = new ArrayCollection();
        $this->deposit = new ArrayCollection();
    }


    /**
     * Get the value of dividend
     *
     * @return  ArrayCollection
     */
    public function getDividend(): ArrayCollection
    {
        return $this->dividend;
    }

    /**
     * Set the value of dividend
     *
     * @param   Dividend  $dividend
     *
     * @return  self
     *    
     */
    public function addDividend(Dividend $dividend): self
    {
        if (!$this->dividend->contains($dividend)) {
            $this->dividend->add($dividend);
        }

        return $this;
    }

    /**
     * Get the value of lending
     *
     * @return  ArrayCollection
     */
    public function getLending(): ArrayCollection
    {
        return $this->lending;
    }

    /**
     * Set the value of lending
     *
     * @param   Lending  $lending
     *
     * @return  self
     */
    public function addLending(Lending $lending): self
    {
        if (!$this->lending->contains($lending)) {
            $this->lending->add($lending);
        }
        return $this;
    }

    /**
     * Get the value of transaction
     *
     * @return  ArrayCollection
     */
    public function getTransaction(): ArrayCollection
    {
        return $this->transaction;
    }

    /**
     * Set the value of transaction
     *
     * @param   Transaction  $transaction
     *
     * @return  self
     */
    public function addTransaction(Transaction $transaction): self
    {
        if (!$this->transaction->contains($transaction)) {
            $this->transaction->add($transaction);
        }
        return $this;
    }

    /**
     * Get the value of interest
     *
     * @return  ArrayCollection
     */
    public function getInterest(): ArrayCollection
    {
        return $this->interest;
    }

    /**
     * Set the value of interest
     *
     * @param   Interest  $interest
     *
     * @return  self
     */
    public function addInterest(Interest $interest): self
    {
        if (!$this->interest->contains($interest)) {
            $this->interest->add($interest);
        }
        return $this;
    }

    /**
     * Get the value of withdraw
     *
     * @return  ArrayCollection
     */
    public function getWithdraw(): ArrayCollection
    {
        return $this->withdraw;
    }

    /**
     * Set the value of withdraw
     *
     * @param   Withdraw  $withdraw
     *
     * @return  self
     */
    public function addWithdraw(Withdraw $withdraw): self
    {
        if (!$this->withdraw->contains($withdraw)) {
            $this->withdraw->add($withdraw);
        }
        return $this;
    }

    /**
     * Get the value of deposit
     *
     * @return  ArrayCollection
     */
    public function getDeposit(): ArrayCollection
    {
        return $this->deposit;
    }

    /**
     * Set the value of deposit
     *
     * @param   Deposit  $deposit
     *
     * @return  self
     */
    public function addDeposit(Deposit $deposit): self
    {
        if (!$this->deposit->contains($deposit)) {
            $this->deposit->add($deposit);
        }
        return $this;
    }

    /**
     * Get the value of lines
     *
     * @return  int
     */
    public function getLines(): int
    {
        return $this->lines;
    }

    /**
     * Set the value of lines
     *
     * @param   int  $lines
     *
     * @return  self
     */
    public function setLines(int $lines): self
    {
        $this->lines = $lines;

        return $this;
    }
}
