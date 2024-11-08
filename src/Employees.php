<?php

namespace PZ;

use PZ\Employees\EmployeesIds;
use PZ\Employees\EmployeeName;

class Employees
{
    use EmployeesIds;
    use EmployeeName;

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}
