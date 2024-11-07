<?php

namespace PZ\Animals;

trait AnimalIds
{
    public function byIds(array $ids)
    {
        $byIds = [];

        foreach ($ids as $id) {
            $animal = $this->byId($id);
            if ($animal) {
                $byIds[] = $animal;
            }
        }

        return $byIds;
    }

    public function byId(string $id)
    {
        $animals = $this->db->selectAnimals();
        $animal = $this->findAnimalById($animal, $id);

        if ($animal) {
            $residents = $this->residentsNickNames($animal['residents']);
            return array_merge($animal, ['residents' => $residents]);
        }

        return null;
    }

    private function findAnimalById(array $animals, string $id)
    {
        foreach ($animals as $animal) {
            if ($animal['id'] === $id) {
                return $animal;
            }
        }

        return null;
    }
}
