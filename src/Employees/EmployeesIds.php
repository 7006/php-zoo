<?php

namespace PZ\Employees;

trait EmployeesIds
{
    public function byId(string $id)
    {
        $employees = $this->db->selectEmployees();

        foreach ($employees as $employee) {
            if ($employee['id'] === $id) {
                return $employee;
            }
        }

        return null;
    }

    public function byIds(array $ids)
    {
        $byIds = [];

        foreach ($ids as $id) {
            $employee = $this->byId($id);
            if ($employee) {
                $byIds[] = $employee;
            }
        }

        return $byIds;
    }
}
