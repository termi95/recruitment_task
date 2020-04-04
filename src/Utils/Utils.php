<?php

namespace App\Utils;

class Utils
{
    const MIN_RANGE = 1;
    const MAX_RANGE = 99999;

    /**
     * check if number is it range
     *
     * @param integer $number
     * @param integer $minRange
     * @param integer $maxRange
     * @return boolean
     */
    public function checkIfNumberIsInRange(int $number, int $minRange = self::MIN_RANGE, int $maxRange = self::MAX_RANGE): bool
    {
        if ($number >= $minRange && $number <= $maxRange)
        {
            return true;
        }

        return false;
    }
}