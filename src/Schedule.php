<?php

namespace PZ;

class Schedule
{   
    private const CLOSED_MESSAGE = 'CLOSED';

    private $db;

    private function convertTimeFormat(int $time)
    {
        return $time - 12;
    }

    private function isMonday(string $day)
    {
        return $day === 'Monday';
    }

    private function message(int $open, int $close)
    {   
        return $open === 0 && $close === 0 ? 
            self::CLOSED_MESSAGE : 
            sprintf('Open from %sam until %spm', $open, $close)
        ;
    }

    // private function weekSchedule()
    // {
    //     $week = $this->db->selectHours();

    //     $schedule = [];

    //     foreach ($week as $day => $hours){
    //         if ($this->isMonday($day)) {
    //             $schedule[$day] = self::CLOSED_MESSAGE;
    //         } else {
    //             $openTime = $hours['open'];
    //             $closeTime = $this->convertTimeFormat($hours['close']);
    //             $message = $this->message($openTime, $closeTime);
    //             $schedule[$day] = $message;
    //         } 
    //     }
    //     return $schedule;
    // }

    private function weekSchedule()
    {
        $week = $this->db->selectHours();

        $fn = function ($day) {
            $open = $day['open'];
            $close = $this->convertTimeFormat($day['close']);
            return $this->message($open, $close);
        };

        return array_map($fn, $week);
    }

    private function daySchedule(string $day)
    {
        $week = $this->db->selectHours();

        if ($this->isMonday($day)) {
            return [$day => self::CLOSED_MESSAGE];
        } else {
            $openTime = $week[$day]['open'];
            $closeTime = $this->convertTimeFormat($week[$day]['close']);
            $message = $this->message($openTime, $closeTime);
        }
    
        return [$day => $message];
    }

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function schedule(){
        return func_num_args() === 0 ? $this->weekSchedule() : $this->daySchedule(func_get_arg(0));
    }

    // private function getTime(string $week, array $day)
    // {
    //     $openTime = $day['open'];
    //     $closeTime = $this->convertTimeFormat($hours['close']);
    //     $message = $this->message($openTime, $closeTime);
    // }
}

