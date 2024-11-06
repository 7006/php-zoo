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

	//$options = ['includeNames' => true];
	public function byLocationAndBreeds()
	{	
		$byLocationAndBreeds = [];
		
		foreach ($this->db->selectAnimals() as $animal) {
			$byLocationAndBreeds[$animal['location']][$animal['name']] = $this->residentsNickNames($animal['residents']);
		}

		return $byLocationAndBreeds;
	}

	//$options = ['sex' => female];
	public function byLocationAndBreedsAndSex()
	{	
		$sex = 'female'; // takes by $options
		$byLocationAndBreedsAndSex = [];
				
		foreach ($this->db->selectAnimals() as $animal) {
			$residents = $animal['residents'];
			$filteredResidents = $this->filterBySex($residents, $sex);
			$byLocationAndBreedsAndSex[$animal['location']][$animal['name']] = $this->residentsNickNames($filteredResidents);
		}

		return $byLocationAndBreedsAndSex;
	}

	private function filterBySex(array $residents, string $sex)
	{
		return array_filter($residents, fn ($resident) => $resident['sex'] === $sex);
	}
}