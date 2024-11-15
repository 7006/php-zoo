<?php

use PZ\Db;
use PZ\EntryCalculator;
use PZ\Schedule;
use PZ\Animals;
use PZ\Employees;

require_once 'vendor/autoload.php';

$db = Db::load(__DIR__ . '/db.json');
$calc = new EntryCalculator($db);
$schedule = new Schedule($db);
$animals = new Animals($db);
$employees = new Employees($db);

$result = $employees->employeeCoverage([]);

echo '<pre>';
print_r($result);
echo '</pre>';
