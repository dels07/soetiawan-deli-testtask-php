# PHP Test Task

## Description

Suggested lunch API.

> Note: due to json file not updated you might need to modify the date in `$today` variable in `LunchService.php:21`.
> Unit tests provided already demonstrated some dates.

## User Story

As a User I would like to make a request to an API that will determine from a set of recipes what I can have for lunch today based on the contents of my fridge, so that I quickly decide what I’ll be having.

### Acceptance Criteria

- Given that I have made a request to the /lunch endpoint I should receive a JSON response of the recipes that I can prepare based on the availability of ingredients in my fridge.
- Given that an ingredient is past its use-by date (inclusive), I should not receive recipes containing this ingredient.
- Given that an ingredient is past its best-before date (inclusive), but is still within its use-by date (inclusive), any recipe containing the oldest (less fresh) ingredient should placed at the bottom of the response object.

### Additional Criteria

- The application SHOULD contains unit / integration tests (e.g. PHPUnit).
- The application MUST be completed using an OOP approach.
- The application MUST be PSR compliant.
- Any dependencies MUST be installed using Composer (no need to commit dependencies, the composer.lock file will be sufficient).
- Use PHP5.6 or PHP7.
- Any installation, build steps, testing and usage instructions MUST be provided in a README.md file in the root of the application.

## Requirements

- PHP 5.6 / 7.x installed.
- Composer installed.

## Installation

- Git clone for the project repo.

```
$ git clone https://github.com/dels07/soetiawan-deli-testtask-php.git
```

- Change to the cloned project directory.

```
$ cd soetiawan-deli-testtask-php
```

- Install project dependancies.

```
composer install --prefer-dist
```

- Start development server.

```
$ symfony serve
#or
$ symfony server:start
```

- Open browser or use rest client (postman/insomnia) to access.

```
http://127.0.0.1:8000/lunch
```
