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
                    parse_str($request->getUri()->getQuery(), $queryParams);
                    $body = (string) $request->getBody();

                    $requestParams = [
                        'method' => $request->getMethod(),
                        'content' => $request->getHeaderLine('Content-Type'),
                        'scheme' => $request->getUri()->getScheme(),
                        'host' => $request->getUri()->getHost(),
                        'path' => $request->getUri()->getPath(),
                        'query' => (object) $queryParams,
                        'params' => ($body !== '' ? \json_decode($body) : null),
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
