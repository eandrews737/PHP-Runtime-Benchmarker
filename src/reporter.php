<?php declare(strict_types=1);
namespace Reporter;

use Comparator\Comparator;

class Reporter
{
    /**
     * @param object $data
     * @param string $style
     * @return Comparator
     */
    public function printReport(object $data, $style = 'string'): Comparator
    {
        switch (strtolower($style)) {
            case "json":
                return self::jsonPrint($data);
            case "file":
                return self::filePrint($data);
            case "raw":
                return $data;
            case "string":
            default:
                return self::stringPrint($data);
        }
    }

    /**
     * @param object $data
     * @return string|null
     */
    private function jsonPrint(object $data): ?string
    {
        return json_encode($data);
    }

    /**
     * @param object $data
     * @return string
     */
    private function stringPrint(object $data): string
    {
        return self::formatPrint($data);
    }

    /**
     * @param object $data
     */
    private function filePrint(object $data): void
    {
        $stdout = fopen('benchmark_results.txt', 'w');
        fputs($stdout, self::formatPrint($data));
        fclose($stdout);
    }

    /**
     * @param object $data
     * @return string
     */
    private function formatPrint(object $data): string
    {
        $printString = '';

        // print out min/max times
        $printString .= self::orderStyle('Function Times', $data->isAscSort);
        $printString .= self::stringifyArray($data->functionTimes);

        // print out average times
        $printString .= self::orderStyle('Average Times', $data->isAscSort);
        $printString .= self::stringifyArray($data->avgTimes);

        return $printString;
    }

    /**
     * @param string $title
     * @param bool $isAscSort
     * @return string
     */
    private function orderStyle(string $title, bool $isAscSort): string
    {
        if ($isAscSort) {
            return $title . " (Ascending)\n\n";
        } else {
            return $title . " (Descending)\n\n";
        }
    }

    /**
     * @param array $times
     * @return string
     */
    private function stringifyArray(array $times): string
    {
        $tempString = '';

        for ($i=0; $i < count($times); $i++) {
            $tempString .= $i+1 . '. ';
            $tempString .= ($times[$i][0] . " - ");
            $tempString .= ($times[$i][1] . "\n");
        }
        $tempString .= "\n";

        return $tempString;
    }
}
