<?php declare(strict_types=1);
namespace Comparator;

class Comparator
{
    public $avgTimes = [];
    public $functionTimes = [];
    public $isAscSort = true;

    /**
     * @param bool $isAscSort
     */
    public function sortData($isAscSort = true): void
    {
        if ($isAscSort) {
            sort($this->avgTimes);
            sort($this->functionTimes);
        } else {
            rsort($this->avgTimes);
            rsort($this->functionTimes);
        }
    }

    /**
     * @param string $functionName
     * @param float $highestTime
     * @param float $average
     */
    public function collectData(string $functionName, float $highestTime, float $average): void
    {
        array_push($this->functionTimes, array($functionName, $highestTime));
        array_push($this->avgTimes, array($functionName, $average));
    }
}
