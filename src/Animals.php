<?php

namespace PZ;

use PZ\Animals\AnimalCount;
use PZ\Animals\AnimalPopularity;
use PZ\Animals\AnimalIds;
use PZ\Animals\AnimalNames;
use PZ\Animals\AnimalMap;
use PZ\Animals\AnimalResidents;

class Animals
{
    use AnimalCount;
    use AnimalPopularity;
    use AnimalIds;
    use AnimalNames;
    use AnimalMap;
    use AnimalResidents;

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}
