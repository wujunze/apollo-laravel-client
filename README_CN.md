# apollo-laravel-client
Apollo 配置中心 Laravel 客户端


[![Build Status](https://travis-ci.org/wujunze/apollo-laravel-client.svg?branch=master)](https://travis-ci.org/wujunze/apollo-laravel-client)
[![Latest Stable Version](https://poser.pugx.org/wujunze/apollo-laravel-client/v/stable.svg)](https://packagist.org/packages/wujunze/apollo-laravel-client)
[![Licence](https://poser.pugx.org/wujunze/apollo-laravel-client/license.svg)](https://packagist.org/packages/wujunze/apollo-laravel-client)
[![Total Downloads](https://poser.pugx.org/wujunze/apollo-laravel-client/downloads.svg)](https://packagist.org/packages/wujunze/apollo-laravel-client)


# Features

- 基于 [Apollo](https://github.com/ctripcorp/apollo/wiki/Apollo%E9%85%8D%E7%BD%AE%E4%B8%AD%E5%BF%83%E4%BB%8B%E7%BB%8D) 提供的 HTTP API 实现 Laravel Apollo 客户端
- 对 Laravel 的 env config 机制无侵入  
- 通过 Command 来自动更新配置文件 
- [Apollo配置中心介绍](https://github.com/ctripcorp/apollo/wiki/Apollo%E9%85%8D%E7%BD%AE%E4%B8%AD%E5%BF%83%E4%BB%8B%E7%BB%8D) 的介绍

# Install

```php   
 composer require wujunze/apollo-laravel-client 
```
    
    
If you use Laravel < 5.5 run:
    
```php
php artisan vendor:publish --provider="WuJunze\LaravelApollo\Providers\ServiceProvider"
```
    
in your console to publish default configuration files.
    
#### If you are using Laravel 5.5 run:
    
```php
php artisan vendor:publish
```
    
and choose the number matching `"WuJunze\LaravelApollo\Providers\ServiceProvider"` provider.
This operation will create config file in `config/apollo.php`.


## Configuration

you can change the locale at config/apollo.php

```php
[
//Your env template  Just fill it out according to Laravel's env file 
    'env_tpl' =>
"APP_NAME = {APP_NAME}
APP_ENV = {APP_ENV}
APP_KEY = {APP_KEY}",
    'env_dir' => env('ENV_DIR', app_path()),
    'env_file' => env('ENV_FILE', '.env'),
    'save_dir' => env('SAVE_DIR', storage_path()),
    'server' => env('APOLLO_SERVER', 'http://127.0.0.1:8080'),
    //Apollo app_id
    'app_id' => env('APOLLO_SERVER_APP_ID', 'contract'),
    'namespaces' => env('APOLLO_SERVER_APP_ID', ['application']),
    //灰度发布的客户端ip
    'client_ip' => env('APOLLO_CLIENT_IP'),
    'restart' => env('APOLLO_RESTART', false),

    'cluster' => env('APOLLO_CLUSTER', 'default'),
    'pull_timeout' => env('APOLLO_PULL_TIMEOUT', 10),
    'interval_timeout' => env('APOLLO_INTERVAL_TIMEOUT', 60),
];
```

## Usage

run the command
```bash
 php artisan apollo:update
```

## License
MIT