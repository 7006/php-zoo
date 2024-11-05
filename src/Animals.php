<?php

namespace PZ;

use PZ\Animals\AnimalCount;
use PZ\Animals\AnimalPopularity;
use PZ\Animals\AnimalIds;
use PZ\Animals\AnimalNames;

class Animals
{
    use AnimalCount;
    use AnimalPopularity;
    use AnimalIds;
    use AnimalNames;

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}
