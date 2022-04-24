<?php declare(strict_types=1);

require_once('../src/benchmark.php');

use benchmarker\Benchmarker;
use PHPUnit\Framework\TestCase;

final class Test extends TestCase
{
    public function testDataReturnsObject()
    {
        $testString = benchmarker::benchmark(['Test::hardFunction', 'Test::easyFunction'], 5, false, 'raw');
        $this->assertIsObject($testString);
    }

    // assume it would take less than .2 seconds
    public function testEasyTimerFunction()
    {
        $testTime = benchmarker::timeFunctionExecution('Test::easyFunction');

        $this->assertGreaterThan(.249, $testTime);
    }

    // assume it would take more than 1 second
    public function testHardTimerFunction()
    {
        $testTime = benchmarker::timeFunctionExecution('Test::hardFunction');

        $this->assertGreaterThan(.99, $testTime);
    }

    public static function easyFunction()
    {
        for ($x = 0; $x < 1; $x++) {
            usleep(250000);
        }
    }
            
    public static function hardFunction()
    {
        for ($x = 0; $x < 4; $x++) {
            usleep(250000);
        }
    }
}
