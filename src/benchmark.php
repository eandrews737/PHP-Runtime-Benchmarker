<?php declare(strict_types=1);
namespace Benchmarker;

require_once('comparator.php');
require_once('reporter.php');

use Comparator\Comparator;
use Reporter\Reporter;
use Exception;

class Benchmarker
{
    /**
     * @param array $functions
     * @param int|null $executionAmount
     * @param bool|null $isAscSort
     * @param string|null $printStyle
     * @return Comparator
     */
    public static function benchmark(
        array $functions,
        int $executionAmount = 1,
        bool $isAscSort = true,
        string $printStyle = 'json'
    ) : Comparator {
        if (strtolower($printStyle) !== 'json' &&
            strtolower($printStyle) !== 'file' &&
            strtolower($printStyle) !== 'raw' &&
            strtolower($printStyle) !== 'string'
        ) {
            throw new Exception('Invalid print format.');
        }

        $data = new comparator;
        $data->isAscSort = $isAscSort;

        $totalTime = 0;

        foreach ($functions as $function) {
            $functionName = strval($function);
            $bestTime = 0;

            for ($x = 0; $x < $executionAmount; $x++) {
                $time = self::timeFunctionExecution($function);
                $totalTime += $time;

                if ($bestTime < $time) {
                    $bestTime = $time;
                }
            }

            $data->collectData($functionName, $bestTime, $totalTime / $executionAmount);
        }

        $data->sortData($isAscSort);

        $report = new reporter;
        return $report->printReport($data, $printStyle);
    }

    /**
     * @param callable $function
     * @return float
     */
    public static function timeFunctionExecution(callable $function): float
    {
        $startTime = microtime(true);
        $function();
        $endTime = microtime(true);

        return $endTime - $startTime;
    }
}
