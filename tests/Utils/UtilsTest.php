<?php

namespace App\Tests\Utils;

use App\Utils\Utils;
use PHPUnit\Framework\TestCase;

class UtilsTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testcheckIfNumberIsInRange($value, $expected)
    {
        $utils = new Utils();
        $result = $utils->checkIfNumberIsInRange($value);
        
        $this->assertEquals($expected, $result);
    }

    public function additionProvider()
    {
        return [
            [0, false],
            [100000, false],
            [-15, false],
            [1, true],
            [100, true],
            [99999, true],
        ];
    }
}