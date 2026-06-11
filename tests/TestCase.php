<?php

namespace Chkltlabs\WixClient\Tests;

use Chkltlabs\WixClient\Wix;
use Nimbly\Capsule\Request;
use Nimbly\Capsule\Response;
use Nimbly\Shuttle\Handler\MockHandler;
use Nimbly\Shuttle\Shuttle;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;


abstract class TestCase extends PHPUnitTestCase
{
    protected function getWixClient(
        //string $environment = "production" //may need later, unsure
    ): Wix {
        $httpClient = new Shuttle(
            handler: new MockHandler([
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
        );

        $wix = new Wix(
            api_key: 'key',
            account_id: 'account',
            site_id: 'site',
        );
        $wix->setHttpClient($httpClient);

        return $wix;
    }
}
