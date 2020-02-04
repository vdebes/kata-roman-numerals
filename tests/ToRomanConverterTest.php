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

    /**
     * @dataProvider integerDataProvider
     */
    public function testToRoman(int $toConvert)
    {
        $testedInstance = new ToRomanConverter();

        $output = $testedInstance->convert($toConvert);

        Assert::assertEquals($this->conversions[$toConvert], $output);
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
            if (is_array($conversion) && isset($conversion[0]) && isset($conversion[1])) {
                $this->conversions[$conversion[0]] = $conversion[1];
            }
        }
    }

    public function integerDataProvider(): array
    {
        return [
            [1],
            [2],
            [3],
            [4],
            [5],
            [6],
        ];
    }
}
