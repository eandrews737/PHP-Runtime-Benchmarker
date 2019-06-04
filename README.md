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

This project is a ----- package.
To install this library to your project run:

```

```

## Using the Project

To use the project simply install the package and run:

```

```

### Reporter

Supported formats:

- raw - returns an object containing arrays of the data
- file - returns a formatted string of the data saved to a file called benchmark.txt
- string - returns a formatted string of the data
- json -returns the data is a JSON format

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

## Deployment

To deploy updates for this package run:

```

```

## Built With

- [phpunit](https://phpunit.de/getting-started/phpunit-8.html) - Unit Testing Framework
- [Composer]https://getcomposer.org/) - Dependency Management

## Authors

[ME](https://github.com/eandrews737)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
