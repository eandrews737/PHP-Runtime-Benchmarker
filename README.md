# PHP Function Benchmarker

A PHP library that takes in an array of functions and gives the user a report that ranks the runtime of each one.
So far the functions will be ranked by min, max or average times.
The report is customizable and currently supports JSON, console printing or file printing.

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

[Find it here](https://packagist.org/packages/eandrews737/php-benchmarker)

## Using the Project

To use the project simply install the package and add:

```

```

##& Parameters

- `functions` - Array of functions
- `function names` - Array of function names (must be equal length to the first array)
- `executionAmount` (optional) - Amount of times to test each function. defaults to 1.
- `isAscSort` (optional) - Whether or not to arrange the info asc or des. Defaults to true.
- `printStyle` (optional) - Style to print out info. Defaults to json. See next section for more options.

### Reporter

Supported formats:

- raw - returns an object containing arrays of the data
- file - returns a formatted string of the data saved to a file called benchmark.txt
- string - returns a formatted string of the data
- json - returns the data is a JSON format

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
