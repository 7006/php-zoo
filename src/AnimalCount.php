<?php

namespace PZ;

class AnimalCount
{
	private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function animalCount()
    {
        $animalCountByBreeds = [];

        foreach ($this->db->selectAnimals() as $animal) {
           $animalCountByBreeds[$animal['name']] = count($animal['residents']);
        }

        return $animalCountByBreeds;
    }

	public function animalBreedCount(string $breed)
    {
        $animalCountByBreeds = $this->animalCount();

        return $animalCountByBreeds[$breed];
    }
}
