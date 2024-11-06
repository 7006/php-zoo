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
}