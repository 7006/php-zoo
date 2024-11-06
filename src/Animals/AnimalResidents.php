<?php

namespace PZ\Animals;

trait AnimalResidents
{
	private function residentsNickNames(array $residents)
    {
        return array_map(fn ($resident) => $resident['name'], $residents);
    }

    private function filterResidentsBySex(array $residents, string $sex)
	{
		return array_filter($residents, fn ($resident) => $resident['sex'] === $sex);
	}
}
