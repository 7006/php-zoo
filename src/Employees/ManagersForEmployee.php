<?php

namespace PZ\Employees;

trait ManagersForEmployee
{
    public function managersForEmployee(string $idOrName)
    {
        $employee = $this->byId($idOrName);
        if ($employee) {
            return $this->replaceManagers($employee);
        }

        $employee = $this->byFirstOrLastName($idOrName);
        if ($employee) {
            return $this->replaceManagers($employee);
        }

        return null;
    }

    private function managersNames(array $employee)
    {
        $fn = function ($managerId) {
            $manager = $this->byId($managerId);
            return $manager['firstName'] . ' ' . $manager['lastName'];
        };

        return array_map($fn, $employee['managers']);

    }

    private function replaceManagers(array $employee)
    {
        $managers = $this->managersNames($employee);

        return array_merge($employee, ['managers' => $managers]);
    }
}
