<?php

namespace PZ;

class AnimalPopularity
{
	private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function animalsByPopularity()
    {
        $animalsByPopularity = [];

        foreach ($this->db->selectAnimals() as $animal) {
        	if (!isset($animalsByPopularity[$animal['popularity']])) {
				$animalsByPopularity[$animal['popularity']] = [$animal['name']];
        	} else {
        		$animalsByPopularity[$animal['popularity']][] = $animal['name'];	
        	}
        }
        ksort($animalsByPopularity);

        return $animalsByPopularity;
    }

    public function animalByRating(int $rating)
    {
        	
    }
}