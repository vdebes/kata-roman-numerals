<?php

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use vdebes\RomanNumerals\ToRomanConverter;

class ToRomanConverterTest extends TestCase
{
    private const INTEGER = 'integer';
    private const ROMAN = 'roman';

    private static $conversions = [];

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        self::setConversions();
    }

    /** @dataProvider converterDataProvider */
    public function testConvertToRoman($integerToConvert)
    {
        $testedInstance = new ToRomanConverter();

        $output = $testedInstance->convert($integerToConvert);

        Assert::assertEquals(self::$conversions[$integerToConvert], $output);
    }

    public function converterDataProvider()
    {
        return [
            [1],
            [2],
            [3],
            [4],
            [5],
        ];
    }

    private static function setConversions()
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
                self::$conversions[$conversion[0]] = $conversion[1];
            }
        }
    }
}
