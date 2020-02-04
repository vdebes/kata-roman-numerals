<?php

namespace vdebes\RomanNumerals;

class ToRomanConverter
{
    const MAPPING = [
        1 => 'I',
        5 => 'V',
        10 => 'X',
    ];

    public function convert(int $integer)
    {
        $roman = '';
        if ($integer % 5 === 4) {
            return self::MAPPING[1].self::MAPPING[5];
        }

        return str_repeat(self::MAPPING[1], $integer);
    }
}
