<?php

namespace WuJunze\LaravelApollo\Console;


use Illuminate\Console\Command;
use StringTemplate\Engine;
use WuJunze\LaravelApollo\Exceptions\ApolloClientException;
use WuJunze\LaravelApollo\Services\ApolloClientService;

class UpdateCommand extends Command
{

    protected $name = 'apollo:update';
    protected $description = 'Update .env from apollo ';


    protected $stringEngine;

    public function __construct()
    {
        $this->stringEngine = new Engine();

        parent::__construct();
    }

    public function handle()
    {

        $envDir = config('apollo.env_dir');
        $envTpl = config('apollo.env_tpl');
        $envFile = $envDir.DIRECTORY_SEPARATOR.config('apollo.env_file');
        $saveDir = config('apollo.save_dir');
        $cluster = config('apollo.cluster');
        $pullTimeout = config('apollo.pull_timeout');
        $intervalTimeout = config('apollo.interval_timeout');


        //定义apollo配置变更时的回调函数，动态异步更新.env
        $callback = function () use ($saveDir, $envTpl, $envFile, $envDir) {
            $list = glob($saveDir.DIRECTORY_SEPARATOR.'apolloConfig.*');
            $apollo = [];
            foreach ($list as $item) {
                $config = require $item;
                if (is_array($config) && isset($config['configurations'])) {
                    $apollo = array_merge($apollo, $config['configurations']);
                }
            }
            if (!$apollo) {
                throw new ApolloClientException('Load Apollo Config Failed, no config available');
            }

            $envString = $this->stringEngine->render($envTpl, $apollo);

            file_put_contents($envFile, $envString);

            $this->output->success('update success');
        };

        $server = config('apollo.server');

        $appId = config('apollo.app_id');

        $namespaces = config('apollo.namespaces');
        $clientIp = config('apollo.client_ip');

        $apollo = new ApolloClientService($server, $appId, $namespaces);

        $apollo->setCluster($cluster);
        $apollo->setPullTimeout($pullTimeout);
        $apollo->setIntervalTimeout($intervalTimeout);

        if (isset($clientIp) && filter_var($clientIp, FILTER_VALIDATE_IP)) {
            $apollo->setClientIp($clientIp);
        }


        $apollo->save_dir = $saveDir;

        ini_set('memory_limit', '1280M');
        $pid = getmypid();
        $this->output->note("start update at pid: {$pid}");
        $restart = config('apollo.restart');
        do {
            $error = $apollo->start($callback);
            if ($error) {

                $this->output->warning('update error:'.$error);
            }
        } while ($error && $restart);

    }

}