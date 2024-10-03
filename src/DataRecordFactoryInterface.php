<?php

namespace Banpagi\Trading212;

interface DataRecordFactoryInterface {
    public function getInstance(DataRecordEnum $recordType): mixed;
}