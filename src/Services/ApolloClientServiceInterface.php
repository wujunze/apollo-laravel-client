<?php

namespace WuJunze\LaravelApollo\Services;

/**
 * Interface ApolloClientServiceInterface
 * @package WuJunze\LaravelApollo\Services
 */
interface ApolloClientServiceInterface
{

    /**
     * @param null $callback 监听到配置变更时的回调处理
     * @return string
     */
    public function start($callback = null);

    /**
     * @param $cluster
     * @return mixed
     */
    public function setCluster($cluster);

    /**
     * @param $ip
     * @return mixed
     */
    public function setClientIp($ip);

    /**
     * @param $pullTimeout
     * @return mixed
     */
    public function setPullTimeout($pullTimeout);

    /**
     * @param $intervalTimeout
     * @return mixed
     */
    public function setIntervalTimeout($intervalTimeout);

    /**
     * @param $namespaceName
     * @return mixed
     */
    public function getConfigFile($namespaceName);


    /**
     * 获取单个namespace的配置-无缓存的方式
     *
     * @param $namespaceName
     * @return mixed
     */
    public function pullConfig($namespaceName);

    /**
     * @param array $namespaceNames
     * @return mixed
     */
    public function pullConfigBatch(array $namespaceNames);

}