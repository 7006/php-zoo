<?php

namespace PZ;

class Schedule
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function daySchedule(string $dayNameX)
    {
        $schedule = $this->weekSchedule();

        foreach ($schedule as $dayName => $message) {
            if ($dayName === $dayNameX) {
                return [$dayName => $message];
            }
        }
    }

    public function weekSchedule()
    {
        return array_map($this->formatDayMessage(...), $this->db->selectWeek());
    }

    private function formatDayMessage(array $day)
    {
        return $this->isDayClosed($day)
            ? "CLOSED"
            : "Open from ${day['open']} until ${day['close']}";
    }

    private function isDayClosed(array $day)
    {
        return $day['open'] === 0 && $day['close'] === 0;
    }
}
