# Bicycle Project

This is a simple OOP-focused PHP project that includes working with a `Bicycle` class. It emphasizes code cleanliness, error handling and Object-Oriented Programming (OOP) paradigms.

## Requirements

- Linux OS
- PHP version 7.4 or newer
- Composer
- Symfony 5.4

## Installation
Clone the project
`git clone https://github.com/elrukn/Bicycle.git`

Navigate to the project directory
`cd bicycle-project`

Install the dependencies using Composer
`composer install`


## Usage

Once you have the project set up, you can use the `SimpleBicycleCommand` and `BrokenBicycleCommand` commands to interact with the `SimpleBicycle` class.

Here's how to run the `SimpleBicycleCommand`:


Without arguments (uses default values)
`bin/console app:simpleBicycle`

With custom values
`bin/console app:simpleBicycle steel 3 drum comfort drop` 




## Testing

You can run the PHPUnit tests to ensure everything in the project is working as expected:
`bin/phpunit --coverage-html coverage-report  `
