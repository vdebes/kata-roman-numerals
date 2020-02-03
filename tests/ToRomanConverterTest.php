<?php

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use vdebes\RomanNumerals\ToRomanConverter;

class ToRomanConverterTest extends TestCase
{
    private const INTEGER = 'integer';
    private const ROMAN = 'roman';

    private $conversions = [];

    public function setUp(): void
    {
        $this->setConversions();
        parent::setUp();
    }

    public function testConvert1ToRoman()
    {
        $testedInstance = new ToRomanConverter();

        $output = $testedInstance->convert(1);

        Assert::assertEquals($this->conversions[1], $output);
    }

    private function setConversions()
    {
        $conversions = [];
        $handle = fopen(__DIR__.'/roman.csv', 'r');
        if (false !== $handle) {
            while (!feof($handle)) {
                $conversions[] = fgetcsv($handle, 3998, ';');
            }
            fclose($handle);
        }

        foreach ($conversions as $conversion) {
            $this->conversions[$conversion[0]] = $conversion[1];
        }
    }
}
