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
        self::setConversions();
        parent::setUp();
    }

    /**
     * @dataProvider getIntegersToConvert
     */
    public function testConvertToRoman(int $integer): void
    {
        $testedInstance = new ToRomanConverter();

        $output = $testedInstance->convert($integer);

        Assert::assertEquals(self::$conversions[$integer], $output);
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

    public function getIntegersToConvert(): \Generator
    {
        $range = range(1, 3999);
        foreach ($range as $testedInteger) {
            yield [$testedInteger];
        }
    }
}
