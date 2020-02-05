<?php

namespace vdebes\RomanNumerals;

class ToRomanConverter
{
    private const ROMAN_MAPPING = [
        1000 => 'M',
        500 => 'D',
        100 => 'C',
        50 => 'L',
        10 => 'X',
        5 => 'V',
        1 => 'I',
    ];

    private const ROMAN_ROUNDS = [
        1000 => 100,
        500 => 100,
        100 => 10,
        50 => 10,
        10 => 1,
        5 => 1,
    ];

    public function convert(int $integer)
    {
        if ($integer <= 0) {
            throw new \InvalidArgumentException('Cannot convert null or negative numbers.');
        }

        $romanConversion = '';

        $dividend = $integer;
        $divisors = array_keys(self::ROMAN_MAPPING);
        $index = 0;
        do {
            $divisor = $divisors[$index];
            $roundDivisor = self::ROMAN_ROUNDS[$divisor] ?? null;

            if (($divisor - $roundDivisor ?? 0) > $dividend) {
                ++$index;
                continue;
            }

            if ($divisor === $dividend) {
                return $romanConversion.self::ROMAN_MAPPING[$dividend];
            }

            if ($dividend > $divisor) {
                $romanConversion .= self::ROMAN_MAPPING[$divisor];
                $dividend -= $divisor;
                continue;
            }

            if ($roundDivisor && $dividend >= ($divisor - $roundDivisor)) {
                $romanConversion .= self::ROMAN_MAPPING[$roundDivisor].self::ROMAN_MAPPING[$divisor];
                $dividend -= $divisor - $roundDivisor;
            }

            ++$index;
        } while ($dividend > 0);

        return $romanConversion;
    }
}
