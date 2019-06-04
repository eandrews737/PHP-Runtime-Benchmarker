<?php 
namespace reporter;

class Reporter
{
    public function printReport(object $data, $style = 'string')
    {
        switch($style){
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

    // returns with JSON formatting
    private function jsonPrint(object $data) 
    {
        return json_encode($data);
    }

    // prints data to console
    private function stringPrint(object $data) 
    {
        return self::formatPrint($data);
    }

    // prints data to a writeable file
    private function filePrint(object $data)
    {
        $stdout = fopen('benchmark_results.txt', 'w');
        fputs($stdout, self::formatPrint($data)); 
        fclose($stdout);
    }

    // formats for console or file print
    private function formatPrint(object $data)
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

    private function orderStyle(string $title, bool $isAscSort)
    {
        if($isAscSort)
            return $title . " (Ascending)\n\n";
        else
            return $title . " (Descending)\n\n";
    }

    // iterate through all the arrays
    private function stringifyArray(array $times)
    {
        $tempString = '';

        for($i=0; $i < count($times); $i++){
            $tempString .= $i+1 . '. ';
            $tempString .= ($times[$i][0] . " - ");
            $tempString .= ($times[$i][1] . "\n");
        }
        $tempString .= "\n";

        return $tempString;
    }
}