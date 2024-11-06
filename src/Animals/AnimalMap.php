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

	public function byLocationName(/*$options = ['includeNames' => true)*/)
	{	
		$byLocationName = [];
		
		foreach ($this->db->selectAnimals() as $animal) {
			$byLocationName[$animal['location']][$animal['name']] = $this->residentsNickNames($animal['residents']);
		}

		return $byLocationName;
	}

	public function byLocationNameSex(/*$options = ['includeNames' => true, 'sex' => female]*/)
	{	
		$sex = 'female'; // let's assume already taken from $options
		$byLocationNameSex = [];
				
		foreach ($this->db->selectAnimals() as $animal) {
			$filteredResidents = $this->filterBySex($animal['residents'], $sex);
			$byLocationNameSex[$animal['location']][$animal['name']] = $this->residentsNickNames($filteredResidents);
		}

		return $byLocationNameSex;
	}

	private function filterBySex(array $residents, string $sex)
	{
		return array_filter($residents, fn ($resident) => $resident['sex'] === $sex);
	}

}