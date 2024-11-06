<?php

namespace PZ\Animals;

trait AnimalMap
{
	public function byLocation()
	{	
		$byLocation = [];
		
		foreach ($this->db->selectAnimals() as $animal) {
			$byLocation[$animal['location']][] = $animal['name'];
		}

		return $byLocation;
	}

	public function byLocationName(array $options)
	{	
		$options = func_get_arg(0);
		$byLocationName = [];
		
		foreach ($this->db->selectAnimals() as $animal) {
			$byLocationName[$animal['location']][$animal['name']] = $this->residentsNickNames($animal['residents']);
		}

		return $byLocationName;
	}

	public function byLocationNameSex(array $options)
	{	
		$options = func_get_arg(0);
		$byLocationNameSex = [];
				
		foreach ($this->db->selectAnimals() as $animal) {
			$filteredResidents = $this->filterResidentsBySex($animal['residents'], $options['sex']);
			$byLocationNameSex[$animal['location']][$animal['name']] = $this->residentsNickNames($filteredResidents);
		}

		return $byLocationNameSex;
	}

	private function filterResidentsBySex(array $residents, string $sex)
	{
		return array_filter($residents, fn ($resident) => $resident['sex'] === $sex);
	}

	public function optionsHandler(array $options)
	{
		return func_get_arg(0);
	}

	public function animalsMap()
	{
		return func_num_args() === 0 ? $this->byLocation() : $this->optionsHandler(func_get_arg(0));
	}
}