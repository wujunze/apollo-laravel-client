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
    
## 你可以用命令行发布默认的配置文件
    
#### 如果你使用的 Laravel 版本小于5.5 :
    
```php
php artisan vendor:publish --provider="WuJunze\LaravelApollo\Providers\ServiceProvider"
```
    
    
#### 如果你使用的 Laravel 版本大于5.5 :
    
```php
php artisan vendor:publish
```
    
然后选中 `"WuJunze\LaravelApollo\Providers\ServiceProvider"` 这个 ServiceProvider 的数字.
这个操作会创建 `config/apollo.php` 文件.


# Configuration

修改项目配置文件 `config/apollo.php`

一般使用只需要修改

```php
[
// 你的 .env 模板   对照着原来的 .evn 把所有的 key values 填上即可
    'env_tpl' =>
"APP_NAME = {APP_NAME}
APP_ENV = {APP_ENV}
APP_KEY = {APP_KEY}",
    //项目 .env 所在的目录  
    'env_dir' => env('ENV_DIR', app_path()),
    // 项目 .env 的文件名
    'env_file' => env('ENV_FILE', '.env'),
    //本地临时缓存环境的路径
    'save_dir' => env('SAVE_DIR', storage_path()),
    // Apollo 服务端地址
    'server' => env('APOLLO_SERVER', 'http://127.0.0.1:8080'),
    //Apollo 项目的 app_id
    'app_id' => env('APOLLO_SERVER_APP_ID', 'contract'),
    'namespaces' => env('APOLLO_SERVER_APP_ID', ['application']),
    //灰度发布的客户端ip
    'client_ip' => env('APOLLO_CLIENT_IP'),
    'restart' => env('APOLLO_RESTART', false),

     //集群的名字
    'cluster' => env('APOLLO_CLUSTER', 'default'),
    //获取某个namespace配置的请求超时时间
    'pull_timeout' => env('APOLLO_PULL_TIMEOUT', 10),
    //每次请求获取apollo配置变更时的超时时间
    'interval_timeout' => env('APOLLO_INTERVAL_TIMEOUT', 60),
];
```

# Usage

执行更新配置文件的命令 
```bash
 php artisan apollo:update
```
# Inspiration and Thanks
[Apollo](https://github.com/ctripcorp/apollo/wiki/%E5%85%B6%E5%AE%83%E8%AF%AD%E8%A8%80%E5%AE%A2%E6%88%B7%E7%AB%AF%E6%8E%A5%E5%85%A5%E6%8C%87%E5%8D%97)   
[apollo-php-client](https://github.com/multilinguals/apollo-php-client)

# License
MIT