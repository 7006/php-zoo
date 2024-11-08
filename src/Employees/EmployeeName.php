<?php

namespace PZ\Employees;

trait EmployeeName
{
    public function byFirstOrLastName(string $name)
    {
        $employees = $this->db->selectEmployees();

        foreach ($employees as $employee) {
            if ($employee['firstName'] === $name || $employee['lastName'] === $name) {
                return $employee;
            }
        }

        return null;
    }
}
