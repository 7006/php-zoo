<?php

namespace PZ;

class Schedule
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function weekSchedule()
    {
    	$week = $this->db->selectHours();

        $result = [];

        foreach ($week as $day => $hours){
            if ($day === 'Monday') {
                $message = 'CLOSED';
                $result[$day] = $message;
            } else {
                $openTime = $hours['open'];
                $closeTime = $this->convertTimeFormat($hours['close']);
                $message = sprintf('Open from %sam until %spm', $openTime, $closeTime);
                $result[$day] = $message;
            } 
        }
        return $result;
    }

    public function daySchedule(string $entry)
    {
        $week = $this->db->selectHours();

        if ($entry === 'Monday') {
            return [$entry => 'CLOSED'];
        } else {
            $openTime = $week[$entry]['open'];
            $closeTime = $this->convertTimeFormat($week[$entry]['close']);
            $message = sprintf('Open from %sam until %spm', $openTime, $closeTime);
        }
    
        return [$entry => $message];
    }

    // private function getTime(string $entry, array $hours)
    // {
    //     $openTime = $hours[$entry]['open'];
    //     $closeTime = $this->convertTimeFormat($hours[$entry]['close']);
    // }

    private function convertTimeFormat(int $time)
    {
        return $time - 12;
    }
}

