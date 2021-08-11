<?php

namespace Framework\Core;

/**
 * HelperAverage
 *
 * @author    Alfred Dagenais <jesuis@alfreddagenias.com>
 * @copyright Alfred Dagenais <devteam@alfreddagenias.com>
 * @copyright MIT License
 */
class HelperAverage
{

    /**
     * Calculate the mean average
     *
     * @param  array $numbers Array of numbers
     *
     * @return float Mean average
     */
    public static function mean(array $numbers): float
    {
        return (array_sum($numbers) / count($numbers));
    }

    /**
     * Calculate the median average
     *
     * @param array $numbers Array of numbers
     *
     * @return float Median average
     */
    public static function median(array $numbers)
    {
        sort($numbers);
        $size = count($numbers);
        if (($size % 2)) {
            return ($numbers[($size / 2)]);
        } else {
            return self::mean(
                array_slice($numbers, (($size / 2) - 1), 2)
            );
        }
    }
}
