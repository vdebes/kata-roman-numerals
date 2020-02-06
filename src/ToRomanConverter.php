<?php

namespace vdebes\RomanNumerals;

class ToRomanConverter
{
    private const INT_ROMAN_MAPPING = [
        1 => 'I',
        5 => 'V',
        10 => 'X',
    ];

    private $limitLow;
    private $limitHigh;

    public function convert(int $integer)
    {
        $this->setLimits($integer);

        $times = (int) floor(5 / $integer);
        $modulo = 5 % $integer;

        if (array_key_exists($integer, self::INT_ROMAN_MAPPING)) {
            return self::INT_ROMAN_MAPPING[$integer];
        }

        if ($modulo === 1 && $times === 1) {
            return self::INT_ROMAN_MAPPING[$this->limitLow].self::INT_ROMAN_MAPPING[$this->limitHigh];
        }

        return str_repeat(self::INT_ROMAN_MAPPING[$this->limitLow], $integer);
    }

    private function setLimits(int $integer)
    {
        $integerMappingIndexes = array_keys(self::INT_ROMAN_MAPPING );

        foreach ($integerMappingIndexes as $index => $romanIntegerValue) {
            if ($integer >= $romanIntegerValue) {
                $this->limitLow = $romanIntegerValue;
            }

            $this->limitHigh = $integerMappingIndexes[$index+1];

            return;
        }
    }
}
