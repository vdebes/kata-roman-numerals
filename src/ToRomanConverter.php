<?php

namespace vdebes\RomanNumerals;

class ToRomanConverter
{
    private const INT_ROMAN_MAPPING = [
        1 => 'I',
        5 => 'V',
        10 => 'X',
    ];

    public function convert(int $integer)
    {
        $limitLow = 1;
        $limitHigh = 5;

        $times = (int) floor(5 / $integer);
        $modulo = 5 % $integer;

        if (array_key_exists($integer, self::INT_ROMAN_MAPPING)) {
            return self::INT_ROMAN_MAPPING[$integer];
        }

        if ($modulo === 1 && $times === 1) {
            return self::INT_ROMAN_MAPPING[$limitLow].self::INT_ROMAN_MAPPING[$limitHigh];
        }

        return str_repeat(self::INT_ROMAN_MAPPING[$limitLow], $integer);
    }
}
