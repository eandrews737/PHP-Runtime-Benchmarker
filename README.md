# PHP Function Benchmarker

A PHP package that takes in an array of functions and gives the user a report that ranks the runtime performance of each one.
So far the functions will be ranked by min, max or average times.
The report is customizable and currently supports JSON, console printing or file printing.

Current Version:
```
0.0.5
```

## Getting Started

### Prerequisites

```
Requires >PHP 7.2
```

### Installing

This project is a `composer` package.
To install this library to your project run:

```
composer require eandrews737/benchmarker
```

[Find it on Packagist](https://packagist.org/packages/eandrews737/benchmarker)

## Using the Project

To use the project simply install the package and add:

```
require 'vendor/eandrews737/benchmarker/src/benchmark.php';
use Benchmarker\Benchmarker;
```

Then make a call to the benchmark function.
Example Call:

```
Benchmarker::benchmark(["function1", "function2"], ["function name 1", 'function name 2'], 5, true, 'json');
```

### Parameters

- `functions` (array) - Array of functions.
- `function names` (array) - Array of function names (must be equal length to the first array).
- `executionAmount` (optional int) - Amount of times to test each function. Defaults to 1.
- `isAscSort` (optional boolean) - Whether or not to arrange the info asc or des. Defaults to true.
- `printStyle` (optional string) - Style to print out info. Defaults to json. 

See next section for more details about `printStyle`.

### Reporter

Supported formats:

- `raw` - returns an object containing arrays of the data
- `file` - returns a formatted string of the data saved to a file called benchmark.txt
- `string` - returns a formatted string of the data
- `json` - returns the data is a JSON format

## Running Tests

Unit testing for this project utilizes `phpunit`.

### Unit Testing

Testing for this project requires consistent times.
So a simple test would be comparing a very slow function against a fast one.
The results should always be consistent 99% of the time.

Here's how to run it:

```
phpunit ./tests/test.php
```

While in the root directory, of course.

## Built With

- [phpunit](https://phpunit.de/getting-started/phpunit-8.html) - Unit Testing Framework
- [Composer](https://getcomposer.org/) - Dependency Management

## Authors

[ME](https://github.com/eandrews737)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
