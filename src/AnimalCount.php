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
        $animals = $this->db->selectAnimals();
        $result = [];

        foreach ($animals as $animal) {
            $result[$animal['name']] = count($animal['residents']);
        }
        return $result;
    }

	public function animalBreedCount(string $breed)
    {
        
    }
}