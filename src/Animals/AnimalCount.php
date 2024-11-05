<?php

namespace PZ\Animals;

trait AnimalCount
{
    public function count()
    {
        $byBreeds = [];

        foreach ($this->db->selectAnimals() as $animal) {
            $byBreeds[$animal['name']] = count($animal['residents']);
        }

        return $byBreeds;
    }

    public function breedCount(string $breed)
    {
        $byBreeds = $this->count();

        return $byBreeds[$breed];
    }
}
