<?php

namespace PZ;

class Employees
{
	private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}
