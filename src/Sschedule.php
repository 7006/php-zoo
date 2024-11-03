<?php

namespace PZ;

class Schedule
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function weekSchedule()(array $entry)
    {
        $prices = $this->db->selectPrices();

        $adultPrice = $this->adultPrice($entry, $prices);
        $seniorPrice = $this->seniorPrice($entry, $prices);
        $childPrice = $this->childPrice($entry, $prices);

        return $adultPrice + $seniorPrice + $childPrice;
    }

    private function adultPrice(array $entry, array $prices)
    {
        return isset($entry['Adult']) ? $entry['Adult'] * $prices['Adult'] : 0;
    }

    private function seniorPrice(array $entry, array $prices)
    {
        return isset($entry['Senior']) ? $entry['Senior'] * $prices['Senior'] : 0;
    }

    private function childPrice(array $entry, array $prices)
    {
        return isset($entry['Child']) ? $entry['Child'] * $prices['Child'] : 0;
    }
}
