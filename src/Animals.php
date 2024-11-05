<?php

namespace PZ;

class Animals
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function byName(string $nickName)
    {
        foreach ($this->db->selectAnimals() as $animal) {
            foreach ($animal['residents'] as $resident) {
                if ($resident['name'] === $nickName) {
                    return [
                        'name' => $resident['name'],
                        'sex' => $resident['sex'],
                        'age' => $resident['age'],
                        'species' => $animal['name']
                    ];
                }
            }
        }
    }

    public function byId(string $id)
    {
        foreach ($this->db->selectAnimals() as $animal) {
            if ($animal['id'] === $id) {
                return [
                    'id' => $animal['id'],
                    'name' => $animal['name'],
                    'location' => $animal['location'],
                    'animals' => $this->residentsNickNames($animal['residents'])
                ];
            }
        }
        return null;
    }

    public function byIds(array $ids)
    {
        $byIds = [];

        foreach ($ids as $id) {
            if ($this->byId($id) !== null) {
                $byIds[] = $this->byId($id);
            }      
        }

        return $byIds;
    }

    private function residentsNickNames(array $residents)
    {
        return array_map(fn ($resident) => $resident['name'], $residents);
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
