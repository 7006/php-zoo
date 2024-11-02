<?php

namespace PZ;

class EntryCalculator
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function calculate(array $array)
    {
        $prices = $this->db->selectPrices();
        //...
        return 0;
    }
}
