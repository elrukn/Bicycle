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
`cd Bicycle`

Install the dependencies using Composer
`composer install`


## Usage

Once you have the project set up, you can use the `SimpleBicycleCommand` and `BrokenBicycleCommand` commands to see how they interact with the `Bicycle` class.

### `SimpleBicycleCommand`
- console command named app:simpleBicycle is declared in the SimpleBicycleCommand class, which accepts optional arguments to modify properties of the bicycle.
- uses dependency injection to get an instance of a Bicycle class.
- when the command is executed, if the arguments are provided, they are used to modify the bicycle, and if they are valid, the details of the modified bicycle are printed. If they are not valid, an error message is displayed, and the command fails.
- the class also returns the final status of the command with Command::SUCCESS or Command::FAILURE.


Without arguments (uses default values)
`bin/console app:simpleBicycle`

With custom values
`bin/console app:simpleBicycle steel 3 drum comfort drop` 


### `BrokenBicycleCommand`
- console command named app:brokenBicycle, attempts to create an instance with invalid parameters
- displays error message and returns Command::FAILURE value

Running the brokenBicycle Command
`bin/console app:brokenBicycle`


## Testing

You can run the PHPUnit tests to ensure everything in the project is working as expected:
``` bin/phpunit --coverage-html coverage-report ```
