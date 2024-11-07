<?php

namespace PZ\Animals;

trait AnimalMap
{
    public function animalMap(array $options)
    {
        $animals = $this->db->selectAnimals();

        if (isset($options['sex'])) {
            $animals = $this->filterBySex($animals, $options['sex']);
        }

        return $this->groupByLocation($animals, $options['includeNames'] ?? false);
    }

    private function filterBySex(array $animals, string $sex)
    {
        $filtered = [];

        foreach ($animals as $animal) {
            $residents = $this->filterResidentsBySex($animal['residents'], $sex);

            if (count($residents) > 0) {
                $filtered[] = array_merge($animal, ['residents' => $residents]);
            }
        }

        return $filtered;
    }

    private function groupByLocation(array $animals, bool $includeNames)
    {
        $groups = [];

        foreach ($animals as ['name' => $name, 'location' => $location , 'residents' => $residents]) {
            if ($includeNames) {
                $groups[$location][$name] = $this->residentsNickNames($residents);
            } else {
                $groups[$location][] = $name;
            }
        }

        return $groups;
    }
}
