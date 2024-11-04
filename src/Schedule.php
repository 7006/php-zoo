<?php

namespace PZ;

class Schedule
{   
    private const CLOSED_MESSAGE = 'CLOSED';

    private $db;

    private function convertTimeFormat(int $time)
    {
        return $time === 0 ? 0 : $time - 12;
    }

    private function message(int $open, int $close)
    {   
        return $open === 0 && $close === 0 ? 
            self::CLOSED_MESSAGE : 
            sprintf('Open from %sam until %spm', $open, $close)
        ;
    }

    private function getMessage(array $day)
    {
        return = $this->message($day['open'], $this->convertTimeFormat($day['close']));
    }

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function weekSchedule()
    {
        $week = $this->db->selectHours();

        return array_map(fn ($day) => $this->getMessage($day), $week);
    }

    public function daySchedule(string $dayName)
    {
        $week = $this->db->selectHours();
        $day = $week[$dayName];
               
        return [$dayName => $this->getMessage($day)];
    }
}
