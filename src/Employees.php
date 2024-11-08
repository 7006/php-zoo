<?php

namespace PZ;

use PZ\Employees\EmployeesIds;
use PZ\Employees\EmployeeName;
use PZ\Employees\ManagersForEmployee;

class Employees
{
    use EmployeesIds;
    use EmployeeName;
    use ManagersForEmployee;

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}
