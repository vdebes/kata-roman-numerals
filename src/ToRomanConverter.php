<?php

namespace vdebes\RomanNumerals;

class ToRomanConverter
{
    const MAPPING = [
        1 => 'I',
    ];

    public function convert(int $integer)
    {
        return str_repeat(self::MAPPING[1], $integer);
    }
}
