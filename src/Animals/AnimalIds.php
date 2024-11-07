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


}
