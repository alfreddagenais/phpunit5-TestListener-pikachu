<?php

use Framework\Core\HelperAverage;

class HelperAverageTest extends PHPUnit_Framework_TestCase
{

    /**
     * Set UpTest
     *
     * @return void
     */
    public function setUp()
    {
        // Nothing to Setup
    }

    /**
     * Test CalculationOfMean
     *
     * @return void
     */
    public function testCalculationOfMean()
    {
        $numbers = [
            3,
            7,
            6,
            1,
            5,
        ];
        $this->assertEquals(4.4, HelperAverage::mean($numbers));
    }

    /**
     * Test Calculation Of Median
     *
     * @return void
     */
    public function testCalculationOfMedian()
    {
        $numbers = [
            3,
            7,
            6,
            1,
            5,
        ];
        $this->assertEquals(5, HelperAverage::median($numbers));
    }
}
