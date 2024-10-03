<?php

declare(strict_types=1);

namespace Banpagi\Trading212;

use Banpagi\Trading212\Entity\DataRecords;
use Banpagi\Trading212\Entity\Deposit;
use Banpagi\Trading212\Entity\Dividend;
use Banpagi\Trading212\Entity\Interest;
use Banpagi\Trading212\Entity\Lending;
use Banpagi\Trading212\Entity\Transaction;
use Banpagi\Trading212\Entity\Withdraw;
use Symfony\Component\Uid\Uuid;
use DateTime;
use RuntimeException;

class CvsTransformer
{
    private string $filename = '';

    public function __construct(
        protected readonly DataRecordFactoryInterface $factory = new DataRecordFactory(),
    ) {}

    protected function entityFactory(string $action): mixed
    {
        $actionEnum = null;

        if (stripos($action, DataRecordEnum::DEPOSIT->value) !== false) {
            $actionEnum = DataRecordEnum::DEPOSIT;
        }
        if (stripos($action, DataRecordEnum::WITHDRAW->value) !== false) {
            $actionEnum = DataRecordEnum::WITHDRAW;
        }
        if (stripos($action, DataRecordEnum::INTEREST->value) !== false) {
            $actionEnum = DataRecordEnum::INTEREST;
        }
        if (stripos($action, DataRecordEnum::DIVIDEND->value) !== false) {
            $actionEnum = DataRecordEnum::DIVIDEND;
        }
        if (stripos($action, DataRecordEnum::TRANSACTION_BUY->value) !== false) {
            $actionEnum = DataRecordEnum::TRANSACTION_BUY;
        }
        if (stripos($action, DataRecordEnum::TRANSACTION_SELL->value) !== false) {
            $actionEnum = DataRecordEnum::TRANSACTION_SELL;
        }

        return match ($actionEnum) {
            DataRecordEnum::DEPOSIT => $this->factory->getInstance(DataRecordEnum::DEPOSIT),
            DataRecordEnum::WITHDRAW => $this->factory->getInstance(DataRecordEnum::WITHDRAW),
            DataRecordEnum::INTEREST => $this->factory->getInstance(DataRecordEnum::INTEREST),
            DataRecordEnum::DIVIDEND => $this->factory->getInstance(DataRecordEnum::DIVIDEND),
            DataRecordEnum::TRANSACTION_BUY => $this->factory->getInstance(DataRecordEnum::TRANSACTION_BUY),
            DataRecordEnum::TRANSACTION_SELL => $this->factory->getInstance(DataRecordEnum::TRANSACTION_SELL),
            default => throw new \RuntimeException('Unknown action [' . $actionEnum . '] in csv file'),
        };
    }

    protected function processData(array $csvRows): DataRecords
    {
        $rowNum = 0;

        $entries = new DataRecords();

        foreach ($csvRows as $csvRow) {
            $uuid = Uuid::v4();
            $entity = $this->entityFactory(strtolower($csvRow['action']));
            $entity->setUuid($uuid);
            $entity->setFilename($this->filename);

            foreach ($csvRow as $header => $val) {
                $entity->setRowNumber($rowNum);

                switch ($header) {
                    case 'action':
                        $entity->setAction($csvRow['action']);

                        if ($entity instanceof Transaction) {
                            $entity->setSide(DirectionEnum::BUY->value);
                            if (false !== stripos($val, 'sell')) {
                                $entity->setSide(DirectionEnum::SELL->value);
                            }
                        }
                        break;
                    case 'time':
                        $t = substr($val, 0, 19);
                        $transactionDate = DateTime::createFromFormat(
                            'Y-m-d H:i:s',
                            $t
                        );
                        if (!$transactionDate) {
                            throw new RuntimeException('Entry has no transaction date (time)');
                        }
                        $entity->setTransactionDate($transactionDate);
                        break;
                    case 'isin':
                        if (!$entity instanceof Transaction && !$entity instanceof Dividend) {
                            break;
                        }

                        /** @see https://www.isin.org/isin-format/ */
                        $isin = $val;
                        if (
                            !preg_match(
                                '/^([A-Z]{2})(\d{1})(\w+)/i',
                                $isin,
                                $matches
                            ) &&
                            !preg_match(
                                '/^([A-Z]{4})(\d{1})(\w+)/i',
                                $isin,
                                $matches
                            )
                        ) {
                            throw new RuntimeException(
                                'ISIN Number not correct: ' . $isin
                            );
                        }
                        $entity->setIsin($isin);
                        break;
                    case 'ticker':
                        $entity->setSymbol($val);
                        break;
                    case 'name':
                        $entity->setName($val);
                        break;
                    case 'no. of shares':
                        $entity->setAmount((float) $val);
                        break;
                    case 'price / share':
                        $entity->setOriginalPrice((float) $val);
                        break;
                    case 'currency (price / share)':
                        $entity->setCurrencyOriginalPrice($val);
                        break;
                    case 'exchange rate':
                        if ($entity instanceof Transaction) {
                            $entity->setExchangerate((float) $val);
                        }
                        break;
                    case 'result':
                        if ($entity instanceof Transaction) {
                            $entity->setProfit((float) $val);
                        }
                        break;
                    case 'currency (result)':
                        if ($entity instanceof Transaction) {
                            $entity->setCurrencyProfit($val);
                        }
                        break;
                    case 'total':
                        $entity->setTotal((float) $val);
                        if ($entity instanceof Dividend) {
                            $entity->setDividend((float) $val);
                        }
                        break;
                    case 'currency (total)':
                        $entity->setCurrencyTotal($val);
                        if ($entity instanceof Dividend) {
                            $entity->setDividendCurrency($val);
                        }
                        break;
                    case 'withholding tax':
                        $entity->setWithHoldingTax((float) $val ?: 0.0);
                        break;
                    case 'currency (withholding tax)':
                        $entity->setCurrencyWithHoldingTax($val);
                        break;
                    case 'id':
                        if ($entity instanceof Transaction) {
                            $entity->setId($val);
                        }
                        break;
                    case 'currency conversion fee':
                        $entity->setConversionFee((float) $val ?: 0.0);
                        break;
                    case 'currency (currency conversion fee)':
                        $entity->setCurrencyConversionFee($val);
                        break;
                    case 'stamp duty reserve tax (eur)':
                        $stamp = $entity->getStampduty() + (float) $val ?: 0.0;
                        $entity->setStampduty($stamp);
                        break;
                    case 'stamp duty (eur)':
                        $stamp = $entity->getStampduty() + (float) $val ?: 0.0;
                        $entity->setStampduty($stamp);
                        break;
                    case 'transaction fee (eur)':
                        $entity->setTransactionFee((float) $val);
                        break;
                    case 'finra fee (eur)':
                        $entity->setFinraFee((float) $val);
                        break;
                    default:
                        $row[] = $val;
                }
            }
            $rowNum++;

            if ($entity instanceof Deposit) {
                $entries->addDeposit($entity);
            }
            if ($entity instanceof Withdraw) {
                $entries->addWithdraw($entity);
            }
            if ($entity instanceof Dividend) {
                $md5Key = md5($entity->getIsin() . $entity->getTransactionDate()->format('Y-d-m H:i:s') . (string)$entity->getTotal());
                $entity->setMd5key($md5Key);
                $entries->addDividend($entity);
            }
            if ($entity instanceof Transaction) {
                $entries->addTransaction($entity);
            }
            if ($entity instanceof Lending) {
                $entries->addLending($entity);
            }
            if ($entity instanceof Interest) {
                $entries->addInterest($entity);
            }
        }

        $entries->setLines($rowNum);
        return $entries;
    }

    public function process(string $filename, array $unprocessedRows): DataRecords
    {
        $this->filename = $filename;

        return $this->processData($unprocessedRows);
    }
}
