# WP Plugin Rating · Eliasis component

[![Latest Stable Version](https://poser.pugx.org/eliasis-framework/wp-plugin-rating/v/stable)](https://packagist.org/packages/eliasis-framework/wp-plugin-rating) [![Latest Unstable Version](https://poser.pugx.org/eliasis-framework/wp-plugin-rating/v/unstable)](https://packagist.org/packages/eliasis-framework/wp-plugin-rating) [![License](https://poser.pugx.org/eliasis-framework/wp-plugin-rating/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/ae4f0c7f751a449eaa616be5e38a6c2c)](https://www.codacy.com/app/Josantonius/wp-plugin-rating?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=eliasis-framework/wp-plugin-rating&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/eliasis-framework/wp-plugin-rating/downloads)](https://packagist.org/packages/eliasis-framework/wp-plugin-rating) [![Travis](https://travis-ci.org/eliasis-framework/wp-plugin-rating.svg)](https://travis-ci.org/eliasis-framework/wp-plugin-rating) [![WP](https://img.shields.io/badge/WordPress-Standar-1abc9c.svg)](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/) [![CodeCov](https://codecov.io/gh/eliasis-framework/wp-plugin-rating/branch/master/graph/badge.svg)](https://codecov.io/gh/eliasis-framework/wp-plugin-rating)


Show plugin rating in WordPress administration pages for plugins developed with Eliasis Framework.

This component requires that the page where the action hook will be inserted has been created with [WP_Menu](https://github.com/Josantonius/WP_Menu).

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Available Methods](#available-methods)
- [Quick Start](#quick-start)
- [Usage](#usage)
- [Tests](#tests)
- [TODO](#-todo)
- [Contribute](#contribute)
- [License](#license)
- [Copyright](#copyright)

---

<p align="center">
    <img src="resources/screenshot-1.png" alt="">
    <img src="resources/screenshot-2.png" alt="">
</p>

---

## Requirements

This component is supported by **PHP versions 5.6** or higher and is compatible with **HHVM versions 3.0** or higher.

## Installation

The preferred way to install this component is through [Composer](http://getcomposer.org/download/).

To install **WP Plugin Rating**, simply:

    $ composer require eliasis-framework/wp-plugin-rating

The previous command will only install the necessary files, if you prefer to **download the entire source code** you can use:

    $ composer require eliasis-framework/wp-plugin-rating --prefer-source

You can also **clone the complete repository** with Git:

    $ git clone https://github.com/eliasis-framework/wp-plugin-rating.git

## Available Methods

Available methods in this component:

### - Show WordPress plugin rating:

```php
Hook::doAction('get_plugin_rating', $slug);
```

| Atttribute | Description | Type | Required
| --- | --- | --- | --- |
| $slug | WordPress plugin slug. | string | Yes |

**@return** HTML output.

## Quick Start

To use this component with **Composer**:

```php
use Josantonius\Hook\Hook;
```

## Usage

### - Show rating of the Search Inside plugin:

```php
Hook::doAction('get_plugin_rating', 'search-inside');
```

## Tests 

To run [tests](tests) you just need [composer](http://getcomposer.org/download/) and to execute the following:

    $ git clone https://github.com/eliasis-framework/wp-plugin-rating.git
    
    $ cd wp-plugin-rating

    $ bash bin/install-wp-tests.sh wordpress_test root '' localhost latest

    $ composer install

Run unit tests with [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Run [WordPress](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/) code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

    $ composer phpmd

Run all previous tests:

    $ composer tests

## ☑ TODO

- [ ] Add new feature.
- [ ] Improve tests.
- [ ] Improve documentation.
- [ ] Refactor code for disabled code style rules. See [phpmd.xml](phpmd.xml) and [.php_cs.dist](.php_cs.dist).

## Contribute

If you would like to help, please take a look at the list of
[issues](https://github.com/eliasis-framework/wp-plugin-rating/issues) or the [To Do](#-todo) checklist.



This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

## Copyright

2017 - 2018 Peter Koech, [kipkoech.com](https://kipkoech.com/)

If you find it useful, let me know :wink:

You can contact me on [email](mailto:peter.koech@gmail.com).