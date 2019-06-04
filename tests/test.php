<?php
declare(strict_types=1);

require_once('./src/benchmark.php');
require_once('./src/reporter.php');
require_once('./src/comparator.php');

use benchmarker\Benchmarker;
use comparator\Comparator;
use reporter\Reporter;


final class Test extends PHPUnit_Framework_TestCase
{
    // proves whole project is working
    public function testDataReturnsObject() 
    {
        $testString = benchmarker::benchmark(['Test::hardFunction', 'Test::easyFunction'], ['hard Function', 'easy Function'], 5, false, 'raw');
        $this->assertInternalType('object', $testString);
    }

    // test the timer function
    // assume it would take less than .2 seconds
    public function testEasyTimerFunction()
    {
        $testTime = benchmarker::timeFunctionExecution('Test::easyFunction');

        $this->assertGreaterThan(.249, $testTime);
    }

    // test the timer function
    // assume it would take more than 1 second
    public function testHardTimerFunction()
    {
        $testTime = benchmarker::timeFunctionExecution('Test::hardFunction');

        $this->assertGreaterThan(.99, $testTime);
    }

    public function easyFunction() 
    {
        for($x = 0; $x < 1; $x++){
            usleep(250000);
        }
    }
            
    public function hardFunction() 
    {
        for($x = 0; $x < 4; $x++){
            usleep(250000);
        }
    }
}