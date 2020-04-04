<?php

namespace App\Service;

class InputDataService
{

    /**
     * get greatest value from sequnce 
     *
     * @param integer $number
     * @return integer
     */
    public function getGreatestValueOfSequence(int $number):int
    {
        return max($this->generateSequence($number));
    }

    /**
     * generate sequnce structure
     *
     * @param integer $number
     * @return array
     */
    private function generateSequence(int $number): array
    {
        $sequnce = [];

        for ($sequnceNumber = 0; $sequnceNumber <= $number; $sequnceNumber++) {

            // skip if value is less then 1
            if ($sequnceNumber > 1) {

                if ($this->isNumberEven($sequnceNumber)) {   
                    // if number is even                  
                    $sequnce[$sequnceNumber] = $sequnce[$sequnceNumber/2];
                } else {
                    // if number is not even   
                    $sequnce[$sequnceNumber] = $sequnce[round($sequnceNumber/2, 0,PHP_ROUND_HALF_DOWN)] + $sequnce[round($sequnceNumber/2, 0, PHP_ROUND_HALF_UP)];
                }

            } else {
                $sequnce[$sequnceNumber] = $sequnceNumber;        
            }
            
        }
        
        return $sequnce;
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