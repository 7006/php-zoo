<?php

namespace PZ;

class Schedule
{   
    private $db;

    private function convertTimeFormat(int $time)
    {
        return $time - 12;
    }

    private function message(int $open, int $close)
    {
        return sprintf('Open from %sam until %spm', $open, $close);
    }

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
                $message = $this->message($openTime, $closeTime);
                $result[$day] = $message;
            } 
        }
        return $result;
    }

    public function daySchedule(string $day)
    {
        $week = $this->db->selectHours();

        if ($day === 'Monday') {
            return [$day => 'CLOSED'];
        } else {
            $openTime = $week[$day]['open'];
            $closeTime = $this->convertTimeFormat($week[$day]['close']);
            $message = $this->message($openTime, $closeTime);
        }
    
        return [$day => $message];
    }

    // private function getTime(string $entry, array $hours)
    // {
    //     $openTime = $hours[$entry]['open'];
    //     $closeTime = $this->convertTimeFormat($hours[$entry]['close']);
    // }

   
}

