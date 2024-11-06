<?php

namespace PZ\Animals;

trait AnimalNames
{
    public function byNickName(string $nickName)
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
        return null;
    }
}
