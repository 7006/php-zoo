<?php

namespace PZ\Animals;

trait AnimalPopularity
{
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
}
