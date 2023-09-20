<?php

namespace Chkltlabs\WixClient\Tests;

use Capsule\Request;
use Capsule\Response;
use Chkltlabs\WixClient\Wix;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Shuttle\Handler\MockHandler;
use Shuttle\Shuttle;


abstract class TestCase extends PHPUnitTestCase
{
    protected function getWixClient(
        //string $environment = "production" //may need later, unsure
    ): Wix {
        $httpClient = new Shuttle([
            'handler' => new MockHandler([
                function (Request $request) {

                    $requestParams = [
                        'method' => $request->getMethod(),
                        'content' => $request->getHeaderLine('Content-Type'),
                        'scheme' => $request->getUri()->getScheme(),
                        'host' => $request->getUri()->getHost(),
                        'path' => $request->getUri()->getPath(),
                        'params' => \json_decode($request->getBody()->getContents()),
                    ];

                    return new Response(200, \json_encode($requestParams));

                },
            ]),
        ]);

        $wix = new Wix('key',
            'host',
            'account',
            'site'
        );
        $wix->setHttpClient($httpClient);

        return $wix;
    }
}
