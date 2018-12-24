<?php

return [
    'env_tpl' =>
"APP_NAME = {'APP_NAME'}
APP_ENV = {'APP_ENV'}
APP_KEY = {'APP_KEY'}",
    'env_dir' => env('ENV_DIR', app_path()),
    'env_file' => env('ENV_FILE', '.env'),
    'save_dir' => env('SAVE_DIR', storage_path()),
    'server' => env('APOLLO_SERVER', 'http://47.93.118.85:8080'),
    'app_id' => env('APOLLO_SERVER_APP_ID', 'contract'),
    'namespaces' => env('APOLLO_SERVER_APP_ID', ['application']),
    //灰度发布的客户端ip
    'client_ip' => env('APOLLO_CLIENT_IP'),
    'restart' => env('APOLLO_RESTART', false),

    'cluster' => env('APOLLO_CLUSTER', 'default'),
    'pull_timeout' => env('APOLLO_PULL_TIMEOUT', 10),
    'interval_timeout' => env('APOLLO_INTERVAL_TIMEOUT', 60),
];