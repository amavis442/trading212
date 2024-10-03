Installation
============

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Open a command console, enter your project directory and execute:

```console
composer require banpagi/trading212import
```

To use, export a file from Trading212

```
<?php
use Banpagi\Trading212\CvsTransformer;
use Banpagi\Trading212\CsvReader;

$reader = new CsvReader($filename);
$reader->setFieldDelimiter(',');        
$rows = $reader->getRows();
       
$worker = new CvsTransformer();
$data = $worker->process($filename, $rows);
```
This will give you a Collection for futher processing.