<?php

namespace PZ;

use PZ\Employees\EmployeesIds;

class Employees
{
	use EmployeesIds;

	private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}
