# Laravel Clickhouse

[![Package Rank](https://phppackages.org/p/Kay4yk/laravel-clickhouse/badge/rank.svg)](https://packagist.org/packages/Kay4yk/laravel-clickhouse)
[![Latest Stable Version](https://poser.pugx.org/Kay4yk/laravel-clickhouse/v/stable)](https://packagist.org/packages/Kay4yk/laravel-clickhouse)
[![Latest Unstable Version](https://poser.pugx.org/Kay4yk/laravel-clickhouse/v/unstable)](https://packagist.org/packages/Kay4yk/laravel-clickhouse)
[![License](https://poser.pugx.org/Kay4yk/laravel-clickhouse/license)](https://packagist.org/packages/Kay4yk/laravel-clickhouse)
[![composer.lock](https://poser.pugx.org/Kay4yk/laravel-clickhouse/composerlock)](https://packagist.org/packages/Kay4yk/laravel-clickhouse)

Laravel Clickhouse - Eloquent model for ClickHouse.

* **Vendor**: Kay4yk
* **Package**: Laravel Clickhouse
* **Version**: [![Latest Stable Version](https://poser.pugx.org/Kay4yk/laravel-clickhouse/v/stable)](https://packagist.org/packages/Kay4yk/laravel-clickhouse)
* **Laravel Version**: `6.x`, `7.x`, `8.x`
* **PHP Version**: 7.2+
* **[Composer](https://getcomposer.org/):** `composer require kay4yk/laravel-clickhouse`

## Get started
```sh
$ composer require kay4yk/laravel-clickhouse
```

Then add the code above into your config/app.php file providers section
```php
Kay4yk\LaravelClickHouse\ClickHouseServiceProvider::class,
```

And add new connection into your config/database.php file. Something like this:
```php
'connections' => [
    'kay4yk::clickhouse' => [
        'driver' => 'Kay4yk::clickhouse',
        'host' => '',
        'port' => '',
        'database' => '',
        'username' => '',
        'password' => '',
        'options' => [
            'timeout' => 10,
            'protocol' => 'https'
        ]
    ]
]
```

Or like this, if clickhouse runs in cluster
```php
'connections' => [
    'kay4yk::clickhouse' => [
        'driver' => 'kay4yk::clickhouse',
        'servers' => [
            [
                'host' => 'ch-00.domain.com',
                'port' => '',
                'database' => '',
                'username' => '',
                'password' => '',
                'options' => [
                    'timeout' => 10,
                    'protocol' => 'https'
                ]
            ],
            [
                'host' => 'ch-01.domain.com',
                'port' => '',
                'database' => '',
                'username' => '',
                'password' => '',
                'options' => [
                    'timeout' => 10,
                    'protocol' => 'https'
                ]
            ]
        ]
    ]
],
```

Then create model
```php
<?php

use Kay4yk\LaravelClickHouse\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
}
```

And use it
```php
Payment::select(raw('count() AS cnt'), 'payment_system')
    ->whereBetween('payed_at', [
        Carbon\Carbon::parse('2017-01-01'),
        now(),
    ])
    ->groupBy('payment_system')
    ->get();

```

---
Supported by
