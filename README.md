# Poker Hand Evaluator

This project evaluates the best poker hand that can be constructed from a given set of playing cards.

## Project Structure
- `src/Poker/`: Contains the main source code for the project.
    - `Card.php`: Represents a playing card.
    - `Hand.php`: Represents a hand of playing cards.
    - `Handler.php`: Contains logic to evaluate the best poker hand.
- `tests/`: Contains the PHPUnit test cases.
    - `HandlerTest.php`: Tests for the `Handler` class.
- `vendor/`: Contains dependencies managed by Composer.
- `composer.json`: Composer configuration file.
- `composer.lock`: Composer lock file.
- `phpunit.xml`: PHPUnit configuration file.

## Requirements

- PHP 7.4 or higher
- Composer

## Setup

1. **Clone the repository**

   ```bash
   git clone git@github.com:blessingk/poker-hand.git
   cd poker-hand
   
2. **Install dependencies**

    ```bash
    composer install

3. **Install dependencies**

    ```bash
   ./vendor/bin/phpunit --version

## Running Tests

1. **Run a specific test file**
    ```bash
   ./vendor/bin/phpunit tests/HandlerTest.php
   
## Start the PHP built-in server

1. **Run the command below**
    ```bash
   php -S localhost:8000 -t public

2. **Send a POST request to the API**
    ```bash
    curl -X POST http://localhost:8000 -d '{"cards":"AS, 10C, 10H, 3D, 3S"}' -H "Content-Type: application/json"

