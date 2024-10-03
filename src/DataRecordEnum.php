<?php

declare(strict_types=1);

namespace Banpagi\Trading212;

enum DataRecordEnum: string
{
    case WITHDRAW = 'withdraw';
    case DEPOSIT = 'deposit';
    case TRANSACTION = 'transaction';
    case DIVIDEND = 'dividend';
    case INTEREST = 'interest';
    case LENDING = 'lending';
    case TRANSACTION_BUY = 'buy';
    case TRANSACTION_SELL = 'sell';
}
