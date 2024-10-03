<?php

namespace Banpagi\Trading212\Entity;

use DateTime;

abstract class AbstractDataRecord
{
	private int $rowNumber = 0;
	private string $uuid = '';
	private string $filename = '';
	private string $action = '';
	private ?DateTime $transactionDate = null;
	private string $isin = '';
	private string $symbol = '';  // ticker
	private string $name = '';
	private float $amount = 0.0;  // num shares
	private float $exchangerate = 0.0;  // Filled with Not available
	private string $currency = '';
	private float $total = 0.0;
	private string $currencyTotal = '';
	private float $withHoldingTax = 0.0;  // Or like i like to call it, stealing
	private string $currencyWithHoldingTax = '';
	private string $notes = '';
	private float $conversionFee = 0.0;
	private string $currencyConversionFee = '';
	private float $originalPrice = 0.0;
	private string $currencyOriginalPrice = '';
	private float $stampduty = 0.0;
	private float $transactionFee = 0.0;
	private float $finraFee = 0.0;

	/**
	 * Get the value of rowNumber
	 *
	 * @return  int
	 */
	public function getRowNumber(): int
	{
		return $this->rowNumber;
	}

	/**
	 * Set the value of rowNumber
	 *
	 * @param   int  $rowNumber
	 *
	 * @return  self
	 */
	public function setRowNumber(int $rowNumber): self
	{
		$this->rowNumber = $rowNumber;

		return $this;
	}

	/**
	 * Get the value of action
	 *
	 * @return  string
	 */
	public function getAction(): string
	{
		return $this->action;
	}

	/**
	 * Set the value of action
	 *
	 * @param   string  $action
	 *
	 * @return  self
	 */
	public function setAction(string $action): self
	{
		$this->action = $action;

		return $this;
	}

	/**
	 * Get the value of transactionDate
	 *
	 * @return  DateTime
	 */
	public function getTransactionDate(): DateTime
	{
		return $this->transactionDate;
	}

	/**
	 * Set the value of transactionDate
	 *
	 * @param   DateTime  $transactionDate
	 *
	 * @return  self
	 */
	public function setTransactionDate(DateTime $transactionDate): self
	{
		$this->transactionDate = $transactionDate;

		return $this;
	}

	/**
	 * Get the value of isin
	 *
	 * @return  string
	 */
	public function getIsin(): string
	{
		return $this->isin;
	}

	/**
	 * Set the value of isin
	 *
	 * @param   string  $isin
	 *
	 * @return  self
	 */
	public function setIsin(string $isin): self
	{
		$this->isin = $isin;

		return $this;
	}

	/**
	 * Get the value of symbol
	 *
	 * @return  string
	 */
	public function getSymbol(): string
	{
		return $this->symbol;
	}

	/**
	 * Set the value of symbol
	 *
	 * @param   string  $symbol
	 *
	 * @return  self
	 */
	public function setSymbol(string $symbol): self
	{
		$this->symbol = $symbol;

		return $this;
	}

	/**
	 * Get the value of name
	 *
	 * @return  string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * Set the value of name
	 *
	 * @param   string  $name
	 *
	 * @return  self
	 */
	public function setName(string $name): self
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get the value of amount
	 *
	 * @return  float
	 */
	public function getAmount(): float
	{
		return $this->amount;
	}

	/**
	 * Set the value of amount
	 *
	 * @param   float  $amount
	 *
	 * @return  self
	 */
	public function setAmount(float $amount): self
	{
		$this->amount = $amount;

		return $this;
	}

	/**
	 * Get the value of exchangerate
	 *
	 * @return  float
	 */
	public function getExchangerate(): float
	{
		return $this->exchangerate;
	}

	/**
	 * Set the value of exchangerate
	 *
	 * @param   float  $exchangerate
	 *
	 * @return  self
	 */
	public function setExchangerate(float $exchangerate): self
	{
		$this->exchangerate = $exchangerate;

		return $this;
	}

	/**
	 * Get the value of currency
	 *
	 * @return  string
	 */
	public function getCurrency(): string
	{
		return $this->currency;
	}

	/**
	 * Set the value of currency
	 *
	 * @param   string  $currency
	 *
	 * @return  self
	 */
	public function setCurrency(string $currency): self
	{
		$this->currency = $currency;

		return $this;
	}

	/**
	 * Get the value of total
	 *
	 * @return  float
	 */
	public function getTotal(): float
	{
		return $this->total;
	}

	/**
	 * Set the value of total
	 *
	 * @param   float  $total
	 *
	 * @return  self
	 */
	public function setTotal(float $total): self
	{
		$this->total = $total;

		return $this;
	}

	/**
	 * Get the value of currencyTotal
	 *
	 * @return  string
	 */
	public function getCurrencyTotal(): string
	{
		return $this->currencyTotal;
	}

	/**
	 * Set the value of currencyTotal
	 *
	 * @param   string  $currencyTotal
	 *
	 * @return  self
	 */
	public function setCurrencyTotal(string $currencyTotal): self
	{
		$this->currencyTotal = $currencyTotal;

		return $this;
	}

	/**
	 * Get the value of withHoldingTax
	 *
	 * @return  float
	 */
	public function getWithHoldingTax(): float
	{
		return $this->withHoldingTax;
	}

	/**
	 * Set the value of withHoldingTax
	 *
	 * @param   float  $withHoldingTax
	 *
	 * @return  self
	 */
	public function setWithHoldingTax(float $withHoldingTax): self
	{
		$this->withHoldingTax = $withHoldingTax;

		return $this;
	}

	/**
	 * Get the value of currencyWithHoldingTax
	 *
	 * @return  string
	 */
	public function getCurrencyWithHoldingTax(): string
	{
		return $this->currencyWithHoldingTax;
	}

	/**
	 * Set the value of currencyWithHoldingTax
	 *
	 * @param   string  $currencyWithHoldingTax
	 *
	 * @return  self
	 */
	public function setCurrencyWithHoldingTax(string $currencyWithHoldingTax): self
	{
		$this->currencyWithHoldingTax = $currencyWithHoldingTax;

		return $this;
	}

	/**
	 * Get the value of notes
	 *
	 * @return  string
	 */
	public function getNotes(): string
	{
		return $this->notes;
	}

	/**
	 * Set the value of notes
	 *
	 * @param   string  $notes
	 *
	 * @return  self
	 */
	public function setNotes(string $notes): self
	{
		$this->notes = $notes;

		return $this;
	}

	/**
	 * Get the value of conversionFee
	 *
	 * @return  float
	 */
	public function getConversionFee(): float
	{
		return $this->conversionFee;
	}

	/**
	 * Set the value of conversionFee
	 *
	 * @param   float  $conversionFee
	 *
	 * @return  self
	 */
	public function setConversionFee(float $conversionFee): self
	{
		$this->conversionFee = $conversionFee;

		return $this;
	}

	/**
	 * Get the value of currencyConversionFee
	 *
	 * @return  string
	 */
	public function getCurrencyConversionFee(): string
	{
		return $this->currencyConversionFee;
	}

	/**
	 * Set the value of currencyConversionFee
	 *
	 * @param   string  $currencyConversionFee
	 *
	 * @return  self
	 */
	public function setCurrencyConversionFee(string $currencyConversionFee): self
	{
		$this->currencyConversionFee = $currencyConversionFee;

		return $this;
	}

	/**
	 * Get the value of uuid
	 *
	 * @return  string
	 */
	public function getUuid(): string
	{
		return $this->uuid;
	}

	/**
	 * Set the value of uuid
	 *
	 * @param   string  $uuid
	 *
	 * @return  self
	 */
	public function setUuid(string $uuid): self
	{
		$this->uuid = $uuid;

		return $this;
	}

	/**
	 * Get the value of filename
	 *
	 * @return  string
	 */
	public function getFilename(): string
	{
		return $this->filename;
	}

	/**
	 * Set the value of filename
	 *
	 * @param   string  $filename
	 *
	 * @return  self
	 */
	public function setFilename(string $filename): self
	{
		$this->filename = $filename;

		return $this;
	}

	/**
	 * Get the value of originalPrice
	 *
	 * @return  float
	 */
	public function getOriginalPrice(): float
	{
		return $this->originalPrice;
	}

	/**
	 * Set the value of originalPrice
	 *
	 * @param   float  $originalPrice
	 *
	 * @return  self
	 */
	public function setOriginalPrice(float $originalPrice): self
	{
		$this->originalPrice = $originalPrice;

		return $this;
	}

	/**
	 * Get the value of currencyOriginalPrice
	 *
	 * @return  string
	 */
	public function getCurrencyOriginalPrice(): string
	{
		return $this->currencyOriginalPrice;
	}

	/**
	 * Set the value of currencyOriginalPrice
	 *
	 * @param   string  $currencyOriginalPrice
	 *
	 * @return  self
	 */
	public function setCurrencyOriginalPrice(string $currencyOriginalPrice): self
	{
		$this->currencyOriginalPrice = $currencyOriginalPrice;

		return $this;
	}

	/**
	 * Get the value of stampduty
	 *
	 * @return  float
	 */
	public function getStampduty(): float
	{
		return $this->stampduty;
	}

	/**
	 * Set the value of stampduty
	 *
	 * @param   float  $stampduty
	 *
	 * @return  self
	 */
	public function setStampduty(float $stampduty): self
	{
		$this->stampduty = $stampduty;

		return $this;
	}

	/**
	 * Get the value of transactionFee
	 *
	 * @return  float
	 */
	public function getTransactionFee(): float
	{
		return $this->transactionFee;
	}

	/**
	 * Set the value of transactionFee
	 *
	 * @param   float  $transactionFee
	 *
	 * @return  self
	 */
	public function setTransactionFee(float $transactionFee): self
	{
		$this->transactionFee = $transactionFee;

		return $this;
	}

	/**
	 * Get the value of finraFee
	 *
	 * @return  float
	 */
	public function getFinraFee(): float
	{
		return $this->finraFee;
	}

	/**
	 * Set the value of finraFee
	 *
	 * @param   float  $finraFee
	 *
	 * @return  self
	 */
	public function setFinraFee(float $finraFee): self
	{
		$this->finraFee = $finraFee;

		return $this;
	}
}
