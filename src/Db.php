<?php

namespace PZ;

class Db
{
    public static function load(string $path)
    {
        $dataJson = json_decode(file_get_contents($path), true);
        return new self($dataJson);
    }

    private array $data;

    public function __construct(array $dataJson)
    {
        $this->data = $dataJson;
    }

    public function selectPrices()
    {
        return $this->data['prices'];
    }

    public function selectWeek()
    {
        return $this->data['hours'];
    }
}
