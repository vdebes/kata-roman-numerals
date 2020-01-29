<?php

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use vdebes\RomanNumerals\ToRomanConverter;

class ToRomanConverterTest extends TestCase
{
    public function testConvert1ToRoman()
    {
        $testedInstance = new ToRomanConverter();

        $output = $testedInstance->oneToRoman();

        Assert::assertEquals('I', $output);
    }
}
