<?php

namespace Banpagi\Trading212;

use Banpagi\Trading212\Entity\Deposit;
use Banpagi\Trading212\Entity\Dividend;
use Banpagi\Trading212\Entity\Interest;
use Banpagi\Trading212\Entity\Lending;
use Banpagi\Trading212\Entity\Transaction;
use Banpagi\Trading212\Entity\Withdraw;

class DataRecordFactory implements DataRecordFactoryInterface
{

    public function getInstance(DataRecordEnum $recordType): mixed
    {
        return match ($recordType) {
            DataRecordEnum::WITHDRAW => new Withdraw(),
            DataRecordEnum::DEPOSIT => new Deposit(),
            DataRecordEnum::TRANSACTION => new Transaction(),
            DataRecordEnum::TRANSACTION_BUY => new Transaction(),
            DataRecordEnum::TRANSACTION_SELL => new Transaction(),
            DataRecordEnum::DIVIDEND => new Dividend(),
            DataRecordEnum::INTEREST => new Interest(),
            DataRecordEnum::LENDING => new Lending(),
        };
    }
}
