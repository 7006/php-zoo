<?php

namespace PZ;

class Db
{
    public static function load(string $path)
    {
        // читаем из файла и формируем пхп массив из json
        $dataJson = ['prices' => []];
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
}
