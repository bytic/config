# View
ByTIC Config component

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bytic/config.svg?style=flat-square)](https://packagist.org/packages/bytic/config)
[![Latest Stable Version](https://poser.pugx.org/bytic/config/v/stable)](https://packagist.org/packages/bytic/config)
[![Latest Unstable Version](https://poser.pugx.org/bytic/config/v/unstable)](https://packagist.org/packages/bytic/config)

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Tests](https://github.com/bytic/config/actions/workflows/tests.yml/badge.svg)](https://github.com/bytic/config/actions/workflows/tests.yml)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/92329f47-7940-4b14-91e9-45330b887bdd/mini.png)](https://insight.sensiolabs.com/projects/92329f47-7940-4b14-91e9-45330b887bdd)
[![Quality Score](https://img.shields.io/scrutinizer/g/bytic/config.svg?style=flat-square)](https://scrutinizer-ci.com/g/bytic/config)
[![StyleCI](https://styleci.io/repos/119902214/shield?branch=master)](https://styleci.io/repos/119902214)
[![Total Downloads](https://img.shields.io/packagist/dt/bytic/config.svg?style=flat-square)](https://packagist.org/packages/bytic/config)

## Compatibility

PHP 8.0 or later and Symfony Config 5, 6, 7, or 8 are supported. Symfony
versions have their own PHP requirements; Symfony 8 requires PHP 8.4 or later.
Existing `Nip\Config` classes, the `config()` helper, and INI/PHP loading remain
available. Symfony Config is a dependency, but this package does not yet expose
Symfony's configuration tree or loader APIs.

The console commands remain based on ByTIC Console. Subclasses overriding their
`configure()` method must declare `: void` for compatibility with Symfony Console 8.

## Usage

```php
use Nip\Config\Factory;

$config = Factory::fromFile('config.ini', true);
$value = $config->get('section.key', 'default');
```

# Inspiration
* https://github.com/caseyamcl/configula