# OwnPass

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]

The OwnPass server application. This application provides an API as well
as an interface for the accounts to manage their credentials.

## Installation

### From source (command line)

1. Clone the repository to a directory that is accessible by your webserver: `git clone git@github.com:ownpass/ownpass.git`
2. Enter the directory: `cd ownpass`
3. Install composer dependencies: `composer install --no-dev -o`
4. Copy `config/autoload/apigility.local.php.dist` to `config/autoload/apigility.local.php` and fill in the correct settings.
5. Copy `config/autoload/doctrine.local.php.dist` to `config/autoload/doctrine.local.php` and fill in the correct settings.
6. Copy `config/autoload/ownpass.local.php.dist` to `config/autoload/ownpass.local.php` and fill in the correct settings.
7. Run `php public/index.php orm:schema-tool:create` to create the database.
8. Run `php public/index.php ownpass:account:create` to create an user account.
9. Run `php public/index.php ownpass:oauth:create-application --name="Chrome Extension" --client=chrome-extension --force` to create an OAuth application for the Chrome Extension
10. Run `php public/index.php ownpass:oauth:create-application --name="Firefox Extension" --client=firefox-extension --force` to create an OAuth application for the Firefox Extension
11. Run `php public/index.php ownpass:oauth:create-application --name="Internet Explorer Extension" --client=ie-extension --force` to create an OAuth application for the Internet Explorer Extension
12. Run `php public/index.php ownpass:generate-keys` to create the public and private key.

To enable development mode, copy `config/development.config.php.dist` to `config/development.config.php` and make sure to 
clear the cache in `data/cache/`. You could consider copying `config/autoload/viewmanager.global.php` to viewmanager.local.php 
and turn on errors so it becomes clear what errors occur.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Community

There's a Gitter room where you can drop questions: https://gitter.im/ownpass/Lobby
You can also find us on IRC. We're on the Freenode network in the channel #ownpass.

## License

All rights reserved. The application is free to use but the rights of the source code are with the OwnPass team.

[ico-version]: https://img.shields.io/packagist/v/ownpass/ownpass.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/ownpass/ownpass/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/ownpass/ownpass.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/ownpass/ownpass.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/ownpass/ownpass
[link-travis]: https://travis-ci.org/ownpass/ownpass
[link-scrutinizer]: https://scrutinizer-ci.com/g/ownpass/ownpass/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/ownpass/ownpass
[link-contributors]: ../../contributors
