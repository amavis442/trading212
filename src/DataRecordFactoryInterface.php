<?php

declare(strict_types=1);

namespace Banpagi\Trading212;

interface DataRecordFactoryInterface
{
    public function getInstance(DataRecordEnum $recordType): mixed;
}
