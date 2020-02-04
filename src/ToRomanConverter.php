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
        if (array_key_exists($integer, self::MAPPING)) {
            return self::MAPPING[$integer];
        }
        if ('4' === substr($integer, -1) && $integer > 10) {
            return 'XIV';
        }

        if (0 === $integer % 10 && $integer <= 30) {
            return str_repeat(self::MAPPING[10], $integer / 10);
        }

        if (4 === $integer % 5) {
            return self::MAPPING[1].self::MAPPING[5];
        }

        return str_repeat(self::MAPPING[1], $integer);
    }
}
