<?php

namespace PZ;

class Schedule
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

// {
//    "Tuesday":"Open from 8am until 6pm",
//    "Wednesday":"Open from 8am until 6pm",
//    "Thursday":"Open from 10am until 8pm",
//    "Friday":"Open from 10am until 8pm",
//    "Saturday":"Open from 8am until 10pm",
//    "Sunday":"Open from 8am until 8pm",
//    "Monday":"CLOSED"
// }

    public function weekSchedule()
    {
    	$hours = $this->db->selectHours();
        return $hours;
        // $message = sprintf('Open from $sam until %spm', $openTime, $closeTime);

    }

// {
//    "Tuesday":"Open from 8am until 6pm"
// }

// {
//    "Monday":"CLOSED"
// }
    public function daySchedule(string $entry)
    {
        $hours = $this->db->selectHours();
        $openTime = $hours[$entry]['open'];
        $closeTime = $this->convertTimeFormat($hours[$entry]['close']);
        
        $message = sprintf('Open from %sam until %spm', $openTime, $closeTime);
        return $message;
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

