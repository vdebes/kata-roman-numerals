<?php

namespace vdebes\RomanNumerals;

class ToRomanConverter
{
    const MAPPING = [
        1 => 'I',
        5 => 'V',
        10 => 'X',
        50 => 'L',
    ];

    public function convert(int $integer)
    {
        if ($integer % 50 === 0) {
            return self::MAPPING[50];
        }
/*
        if ($integer % 50 === 0) {
            return self::MAPPING[50];
        }
   */
        if ($integer % 10 === 0 && $integer <= 30) {
            return str_repeat(self::MAPPING[10], $integer/10);
        }
        if ($integer % 5 === 0) {
            return self::MAPPING[5];
        }
        if ($integer % 5 === 4) {
            return self::MAPPING[1].self::MAPPING[5];
        }

        return str_repeat(self::MAPPING[1], $integer);
    }
}
