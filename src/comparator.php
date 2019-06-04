<?php 
namespace comparator;

class Comparator
{
    public $avgTimes = [];
    public $functionTimes = [];
    public $isAscSort = true; 

    // sort min, max and average data
    public function sortData($isAscSort = true): void
    {        
        if($isAscSort) {
            sort($this->avgTimes);
            sort($this->functionTimes);
        } else {
            rsort($this->avgTimes);
            rsort($this->functionTimes);
        }
    }

    // add data to object
    public function collectData(string $functionName, float $highestTime, float $average): void
    {
        array_push($this->functionTimes, array($functionName, $highestTime));
        array_push($this->avgTimes, array($functionName, $average));
    }
}