<?php

namespace PZ;

class s
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function byPopularity()
    {
        $byPopularity = [];

        foreach ($this->db->selectAnimals() as $animal) {
            $byPopularity[$animal['popularity']][] = $animal['name'];
        }
        ksort($byPopularity);

        return $byPopularity;
    }

    public function byRating(int $rating)
    {
        $byPopularity = $this->byPopularity();
        return $byPopularity[$rating];
    }

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
