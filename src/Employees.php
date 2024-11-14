<?php

namespace PZ;

use PZ\Employees\EmployeesIds;
use PZ\Employees\EmployeeName;
use PZ\Employees\ManagersForEmployee;
use PZ\Employees\EmployeeCoverage;

class Employees
{
    use EmployeesIds;
    use EmployeeName;
    use ManagersForEmployee;
    use EmployeeCoverage;

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}
