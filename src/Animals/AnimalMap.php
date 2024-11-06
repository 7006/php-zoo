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
}