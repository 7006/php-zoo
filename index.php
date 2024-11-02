<?php

use PZ\Db;
use PZ\EntryCalculator;

require_once 'vendor/autoload.php';

$db = Db::load(__DIR__ . 'db.json');
$calculator = new EntryCalculator($db);
$totalPrice = $calculator->calculate(['adult' => 2, 'child' => 1]);
echo $totalPrice;
