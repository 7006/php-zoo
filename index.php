<?php

use PZ\Db;
use PZ\EntryCalculator;
use PZ\Schedule;
use PZ\AnimalCount;

require_once 'vendor/autoload.php';

$db = Db::load(__DIR__ . '/db.json');
$calc = new EntryCalculator($db);
$schedule = new Schedule($db);
$animals = new AnimalCount($db);