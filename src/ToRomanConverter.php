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
        foreach ($divisors as $divisor) {
            $roundDivisor = self::ROMAN_ROUNDS[$divisor] ?? null;
            if ($dividend < ($divisor - $roundDivisor ?? 0)) {
                continue;
            }

            if ($dividend >= $divisor) {
                $quotient = intdiv($dividend, $divisor);
                $dividend -= $quotient * $divisor;
                $romanConversion .= str_repeat(self::ROMAN_MAPPING[$divisor], $quotient);
            }

            if ($roundDivisor && $dividend >= ($divisor - $roundDivisor)) {
                $romanConversion .= self::ROMAN_MAPPING[$roundDivisor].self::ROMAN_MAPPING[$divisor];
                $dividend -= $divisor - $roundDivisor;
            }
        }

        return $romanConversion;
    }
}
