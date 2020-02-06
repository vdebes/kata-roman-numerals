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

    public function convert(int $integer): string
    {
        $this->setLimits($integer);

        $times = (int) floor($this->limitHigh / $integer);
        $modulo = $this->limitHigh % $integer;

        if (array_key_exists($integer, self::INT_ROMAN_MAPPING)) {
            return self::INT_ROMAN_MAPPING[$integer];
        }

        if ($modulo === 1 && $times === 1) {
            return self::INT_ROMAN_MAPPING[$this->limitLow].self::INT_ROMAN_MAPPING[$this->limitHigh];
        }

        return str_repeat(self::INT_ROMAN_MAPPING[$this->limitLow], $integer);
    }

    private function setLimits(int $integer): void
    {
        $integerMappingIndexes = array_keys(self::INT_ROMAN_MAPPING );

        foreach ($integerMappingIndexes as $index => $romanIntegerValue) {
            if ($this->limitLow !== null && $this->limitHigh !== null) {
                return;
            }

            $next = $integerMappingIndexes[$index+1];
            if ($integer >= $romanIntegerValue && $integer < $next) {
                $this->limitLow = $romanIntegerValue;
            }

            $this->limitHigh = $next;
        }
    }
}
