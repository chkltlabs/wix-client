<?php

namespace Tests;

use Chkltlabs\WixClient\Resources\Ecom;
use Chkltlabs\WixClient\Resources\Members;
use Chkltlabs\WixClient\Tests\TestCase;

class DomainResourceTest extends TestCase
{
    public function test_explicit_domain_resource_instantiates(): void
    {
        $wix = $this->getWixClient();

        self::assertInstanceOf(Members::class, $wix->members);
    }

    public function test_domain_resource_prefixes_relative_path_and_merges_query(): void
    {
        $wix = $this->getWixClient();

        $response = $wix->members->listMembersV1Members([], ['status' => 'ACTIVE', 'limit' => 5]);

        self::assertSame('GET', $response->method);
        self::assertSame('/members/v1/members', $response->path);
        self::assertSame('ACTIVE', $response->query->status);
        self::assertSame('5', $response->query->limit);
    }

    public function test_domain_resource_post_supports_arbitrary_endpoint_paths(): void
    {
        $wix = $this->getWixClient();

        self::assertInstanceOf(Ecom::class, $wix->ecom);

        $response = $wix->ecom->queryDiscountRules([], [
            'query' => [
                'paging' => [
                    'limit' => 10,
                ],
            ],
        ]);

        self::assertSame('POST', $response->method);
        self::assertSame('/ecom/v1/discount-rules/query', $response->path);
        self::assertSame(10, $response->params->query->paging->limit);
    }
}
