<?php 
namespace Benchmarker;

require_once('comparator.php');
require_once('reporter.php');

use Comparator\Comparator;
use Reporter\Reporter;

class Benchmarker
{
    public static function benchmark(
        array $arrayOfFunctions, 
        array $functionNames, 
        $executionAmount = 1, 
        $isAscSort = true, 
        $printStyle = 'json'
    ) {
        $data = new comparator;
        $data->isAscSort = $isAscSort;
        $totalTime = 0;
        $index = 0;

        // run each function
        foreach($arrayOfFunctions as $function){
            $functionName = $functionNames[$index];
            $highestTime = 0;

            // time the function as many times as required
            for($x = 0; $x < $executionAmount; $x++) {

                $time = self::timeFunctionExecution($function);
                $totalTime += $time;

                if($highestTime < $time) $highestTime = $time;
            }

            // add times to object
            $data->collectData($functionName, $highestTime, $totalTime / $executionAmount);
            $index++;
        }

        // sort min, max and average times
        $data->sortData($isAscSort);

        // print reports
        $report = new reporter;
        return $report->printReport($data, $printStyle);
    }

    // get execution time of a function
    public function timeFunctionExecution(Callable $function) 
    {        
            // time beginning and end of execution
            $startTime = microtime(true);
            $function();
            $endTime = microtime(true);

            // return overall time
            return $endTime - $startTime;
    }
}