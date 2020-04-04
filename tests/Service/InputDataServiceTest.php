<?php

namespace App\Tests\Service;

use App\Service\InputDataService;
use PHPUnit\Framework\TestCase;

class InputDataServiceTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testcheckIfNumberIsInRange($value, $expected)
    {
        $inputDataService = new InputDataService();
        $result = $inputDataService->getGreatestValueOfSequence($value);
        
        $this->assertEquals($expected, $result);
    }

    public function additionProvider()
    {
        return [
            [0, 0],
            [1, 1],
            [10, 4],
            [5, 3],
            [666, 79],
            [323, 47],
            [22, 8],
            [11, 5],
            [45, 13],
            [64, 13],
        ];
    }

    /**
     * @dataProvider IsNumberEvenProvider
     */
    public function testIsNumberEven($value, $expected)
    {
        $inputDataService = new InputDataService();
        $result = $inputDataService->isNumberEven($value);
        
        $this->assertEquals($expected, $result);
    }

    public function IsNumberEvenProvider()
    {
        return [
            [1, false],
            [2, true],
            [-1, false],
            [-2, true],
        ];
    }
}