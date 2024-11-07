<?php

namespace PZ\Animals;

trait AnimalMap
{	
	// public function animalMap()
	// {
	// 	return func_num_args() === 0 ? $this->byLocation() : $this->optionsHandler(func_get_arg(0));
	// }

	// private function optionsHandler(array $options)
	// {
	// 	$options = func_get_arg(0);
		
	// 	if (isset($options['includeNames']) && $options['includeNames']) {
	// 		return $this->byLocationName();
	// 	}

	// 	if (isset($options['includeNames']) && $options['includeNames'] && isset($options['sex'])) {
	// 		return $this->byLocationNameSex($options);
	// 	}
	// }

	// public function byLocation()
	// {	
	// 	$byLocation = [];
		
	// 	foreach ($this->db->selectAnimals() as $animal) {
	// 		$byLocation[$animal['location']][] = $animal['name'];
	// 	}

	// 	return $byLocation;
	// }

	// public function byLocationName()
	// {	
	// 	$byLocationName = [];
		
	// 	foreach ($this->db->selectAnimals() as $animal) {
	// 		$byLocationName[$animal['location']][$animal['name']] = $this->residentsNickNames($animal['residents']);
	// 	}

	// 	return $byLocationName;
	// }

	// public function byLocationNameSex(array $options)
	// {	
	// 	$options = func_get_arg(0);
	// 	$byLocationNameSex = [];
				
	// 	foreach ($this->db->selectAnimals() as $animal) {
	// 		$filteredResidents = $this->filterResidentsBySex($animal['residents'], $options['sex']);
	// 		$byLocationNameSex[$animal['location']][$animal['name']] = $this->residentsNickNames($filteredResidents);
	// 	}

	// 	return $byLocationNameSex;
	// }

	public function filterAviariesBySex(array $options)
	{	
		$filteredAviaries = [];
		
		foreach ($this->db->selectAnimals() as $aviary) {
			$filteredAviaries[] = [
				'location' => $aviary['location'],
				'name' => $aviary['name'],
				'residents' => $this->filterResidentsBySex($aviary['residents'], $options['sex'])
			];
		}

		return $filteredAviaries;
	}
}

