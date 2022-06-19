# codeigniter4-spatial
[![CodeIgniter 4.2.x](https://img.shields.io/badge/CodeIgniter-4.2.x-orange.svg)](https://codeigniter.com/)
[![Unit Tests](https://github.com/atsanna/codeigniter4-spatial/workflows/PHPUnit/badge.svg)](https://github.com/atsanna/codeigniter4-spatial/actions/workflows/phpunit.yml)
[![Static Analysis](https://github.com/atsanna/codeigniter4-spatial/workflows/PHPStan/badge.svg)](https://github.com/atsanna/codeigniter4-spatial/actions/workflows/phpstan.yml)
[![Architecture](https://github.com/atsanna/codeigniter4-spatial/workflows/Deptrac/badge.svg)](https://github.com/atsanna/codeigniter4-spatial/actions/workflows/deptrac.yml)
[![Coverage Status](https://coveralls.io/repos/github/atsanna/codeigniter4-spatial/badge.svg?branch=main)](https://coveralls.io/github/atsanna/codeigniter4-spatial?branch=main)
[![GitHub license](https://img.shields.io/github/license/atsanna/codeigniter4-spatial)](https://github.com/atsanna/codeigniter4-spatial/blob/main/LICENSE)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/atsanna/codeigniter4-spatial/pulls)

This is an extension for CodeIgniter 4.2.x to work with spatial data types and functions.

## Warning: this is a non-functional experimental version

___

### example configuration

```
    public $default = [
        'DSN'      => '',
        'hostname' => 'localhost',
        'username' => '',
        'password' => '',
        'database' => '',
        'DBDriver' => '\atsanna\Spatial\Postgre',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => (ENVIRONMENT !== 'production'),
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 5432,
    ];
```
