<?php

namespace WuJunze\LaravelApollo\Tests;


use WuJunze\LaravelApollo\Services\ApolloClientService;
use WuJunze\LaravelApollo\Services\ApolloClientServiceInterface;

class ApolloClientTest extends TestCase
{
    public function testDemo()
    {
        $this->assertTrue(true);

    }

    public function testApolloClient()
    {
        $server = 'http://localhost:8080';

        $appId = 'contract';

        $namespaces = ['application', 'public.mysql', 'public.redis'];

        $apollo = new ApolloClientService($server, $appId, $namespaces);

        $this->assertInstanceOf(ApolloClientServiceInterface::class, $apollo);

    }


}