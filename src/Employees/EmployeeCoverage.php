<?php

namespace PZ\Employees;

use PZ\Animals;

trait EmployeeCoverage
{
	public function employeeCoverage(array $options)
	{
		if (empty($options)) {
			$employees = $this->db->selectEmployees();
			$result = [];

			foreach ($employees as $employee) {
               $formatEmbployee = $this->employeeFormat($employee);
               $key = key($formatEmbployee);
               $breeds = array_values($formatEmbployee);
               $result[$key] = $breeds[0];
	        }
	        
	        return $result;
		}
		
		if (isset($options['id'])) {
			$id = $options['id'];
			$employee = $this->byId($id);
			return $this->employeeFormat($employee);
		}
		
		if (isset($options['name'])) {
			$name = $options['name'];
			$employee = $this->byFirstOrLastName($name);
			return $this->employeeFormat($employee);
		}

		return null;
	}

	public function employeeFormat(array $employee)
	{	
		$name = $employee['firstName'] . ' ' . $employee['lastName'];
		$responsibleFor = $this->repalceAnimals($employee);
		return [$name => $responsibleFor];
	}

	public function repalceAnimals(array $employee)
	{	
		$animals = $this->db->selectAnimals();
		$animalsBreedsIds = $employee['responsibleFor'];
		$responsibleFor = [];
		$a = new Animals($db);

		foreach ($animalsBreedsIds as $animalBreedId) {
			$animal = $a->findAnimalById($animals, $animalBreedId);
			$responsibleFor[] = $animal['name'];
		}

		return $responsibleFor;
	}
}
