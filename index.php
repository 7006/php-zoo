<?php

use PZ\Db;
use PZ\EntryCalculator;

require_once 'vendor/autoload.php';

$db = Db::load(__DIR__ . '/db.json');
$calc = new EntryCalculator($db);
