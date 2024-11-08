<?php

namespace PZ\Employees;

trait ManagersForEmployee
{
	public function managersForEmployee(string $idOrName)
	{
		$employees = $this->db->selectEmployees();

		if (str_contains($idOrName, '-')) {
			return $this->byId($idOrName);
		} else {
			return $this->byFirstOrLastName($idOrName);
		} 
	}
}
