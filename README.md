# Zoopla API PHP Client
An unofficial PHP client for the Zoopla API

[![Latest Stable Version][packagist-image]][packagist-url]
[![Github Issues][github-issues-image]][github-issues-url]

## Installation

To install, run `composer require dant89/zoopla-api-php-client` in the root of your project or add `dant89/zoopla-api-php-client` to your composer.json.
```json
"require": {
    "dant89/zoopla-api-php-client": REPLACE_WITH_VERSION
}
```

## Zoopla developer API Documentation

To read more about how the Zoopla developer API functions, please read the [official documentation](https://developer.zoopla.co.uk).


## Usage

Use your provided `api key` upon instantiation of this client. You can also specify the `version` and `response output` to be different from the defaults.


```php
use Dant89\ZooplaApiClient\Client;

// Create base client
$zooplaClient = new Client(ZOOPLA_API_KEY);
// Select application client
$propertyClient = $zooplaClient->getHttpClient('property');
$properties = $propertyClient->getPropertyListings();
```

## Tests

You can test your API key by running the PHPUnit tests included in this client.

Please note that tests will count as API call usages for the API key you specify.

PHPUnit tests:

1. Add your `apiKey` to `tests/Helper/ClientTestCase.php`
2. `php vendor/phpunit/phpunit/phpunit tests`

PHP CodeSniffer:
- `php vendor/squizlabs/php_codesniffer/bin/phpcs src --standard=PSR2 --severity=5 --extensions=php`

PHP MessDetector
- `php vendor/phpmd/phpmd/src/bin/phpmd src text controversial,unusedcode,design `

## Contributions

Contributions to the client are welcome, to contribute please:

1. Fork this repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new pull request


[packagist-image]: https://img.shields.io/packagist/v/dant89/zoopla-api-php-client.svg
[packagist-url]: https://packagist.org/packages/dant89/zoopla-api-php-client

[github-issues-image]: https://img.shields.io/github/issues/dant89/zoopla-api-php-client
[github-issues-url]: https://github.com/dant89/zoopla-api-php-client/issues
