<?php

namespace PZ\Animals;

trait AnimalIds
{
    public function ByIds(array $ids)
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

    private function residentsNickNames(array $residents)
    {
        return array_map(fn ($resident) => $resident['name'], $residents);
    }
}
