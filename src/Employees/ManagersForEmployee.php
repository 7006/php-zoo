<?php

namespace PZ\Employees;

trait ManagersForEmployee
{
	public function managersForEmployee(string $idOrName)
	{
		$employees = $this->db->selectEmployees();

		if (str_contains($idOrName, '-')) {
			$employee = $this->byId($idOrName);
		} else {
			$employee = $this->byFirstOrLastName($idOrName);
		}

		return $this->replaceManagers($employee);
	}

	private function managersNames(array $employee)
	{	
		$managersNames = [];

		foreach ($employee['managers'] as $managerId) {
			$manager = $this->byId($managerId);
			$managersNames[] = "{$manager['firstName']} {$manager['lastName']}";
		}
		
		return $managersNames;
	}

	private function replaceManagers(array $employee)
	{	
		$managers = $this->managersNames($employee);

		return array_merge($employee, ['managers' => $managers]);
	}
}
