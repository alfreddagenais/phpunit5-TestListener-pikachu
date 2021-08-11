<?php

use Framework\Core\HelperAverage;

class HelperAverageTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        // nothing to Setup
    }

    public function testCalculationOfMean()
    {
        $numbers = [3, 7, 6, 1, 5];
        $this->assertEquals(4.4, HelperAverage::mean($numbers));
    }

    public function testCalculationOfMedian()
    {
        $numbers = [3, 7, 6, 1, 5];
        $this->assertEquals(5, HelperAverage::median($numbers));
    }
}
