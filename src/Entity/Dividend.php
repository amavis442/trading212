<?php

namespace Banpagi\Trading212\Entity;

class Dividend extends AbstractDataRecord
{
	private string $md5key = '';
	private float $dividend = 0.0;  // price / share
	private string $dividendCurrency = '';

	/**
	 * Get the value of dividend
	 *
	 * @return  float
	 */
	public function getDividend(): float
	{
		return $this->dividend;
	}

	/**
	 * Set the value of dividend
	 *
	 * @param   float  $dividend
	 *
	 * @return  self
	 */
	public function setDividend(float $dividend): self
	{
		$this->dividend = $dividend;

		return $this;
	}

	/**
	 * Get the value of dividendCurrency
	 *
	 * @return  string
	 */
	public function getDividendCurrency(): string
	{
		return $this->dividendCurrency;
	}

	/**
	 * Set the value of dividendCurrency
	 *
	 * @param   string  $dividendCurrency
	 *
	 * @return  self
	 */
	public function setDividendCurrency(string $dividendCurrency): self
	{
		$this->dividendCurrency = $dividendCurrency;

		return $this;
	}

	/**
	 * Get the value of md5key
	 *
	 * @return  string
	 */
	public function getMd5key(): string
	{
		return $this->md5key;
	}

	/**
	 * Set the value of md5key
	 *
	 * @param   string  $md5key
	 *
	 * @return  self
	 */
	public function setMd5key(string $md5key): self
	{
		$this->md5key = $md5key;

		return $this;
	}
}
