<?php

namespace App\Service;

class InputDataService
{

    /**
     * get greatest value from sequence 
     *
     * @param integer $number
     * @return integer
     */
    public function getGreatestValueOfSequence(int $number):int
    {
        return max($this->generateSequence($number));
    }

    /**
     * generate sequence structure
     *
     * @param integer $number
     * @return array
     */
    private function generateSequence(int $number): array
    {
        $sequence = [];

        for ($sequenceNumber = 0; $sequenceNumber <= $number; $sequenceNumber++) {

            // skip if value is less then 2
            if ($sequenceNumber > 1) {

                if ($this->isNumberEven($sequenceNumber)) {   
                    // if number is even                  
                    $sequence[$sequenceNumber] = $sequence[$sequenceNumber/2];
                } else {
                    // if number is not even   
                    $sequence[$sequenceNumber] = $sequence[round($sequenceNumber/2, 0,PHP_ROUND_HALF_DOWN)] + $sequence[round($sequenceNumber/2, 0, PHP_ROUND_HALF_UP)];
                }

            } else {
                $sequence[$sequenceNumber] = $sequenceNumber;        
            }
            
        }
        
        return $sequence;
    }


    /**
     * check if nuber is even
     *
     * @param integer $number
     * @return boolean
     */
    private function isNumberEven(int $number): bool
    {
        if($number % 2 == 0){
            return true;
        }

        return false;
    }
}