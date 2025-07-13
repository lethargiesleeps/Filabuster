<?php

namespace App\Helpers;

class Common
{
    /**
     * Returns values tied to specified key.
     * @param array $array Array to extract values from
     * @param string $key Key/Column to extract
     * @return array Array containing extracted values
     */
    public static function getArrayValues(array $array, string $key): array {
        if(empty($array)) return [];
        if(!isset($array[0][$key])) throw new \InvalidArgumentException("$key is not a valid array");
        return array_column($array, $key);
    }
}
