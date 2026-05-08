<?php

namespace Tests;

use Chkltlabs\WixClient\Tests\TestCase;
use UnexpectedValueException;

class TypedDomainOperationsTest extends TestCase
{
    public function test_members_typed_operation_sends_expected_request(): void
    {
        $wix = $this->getWixClient();

        $response = $wix->members->listMembersV1Members([], ['limit' => 25]);

        self::assertSame('GET', $response->method);
        self::assertSame('/members/v1/members', $response->path);
        self::assertSame('25', $response->query->limit);
    }

    public function test_ecom_typed_operation_replaces_path_params(): void
    {
        $wix = $this->getWixClient();

        $response = $wix->ecom->getOrder(['id' => 'order-123'], []);

        self::assertSame('GET', $response->method);
        self::assertSame('/ecom/v1/orders/order-123', $response->path);
    }

    public function test_wix_data_typed_operation_sends_body_params(): void
    {
        $wix = $this->getWixClient();

        $response = $wix->wix_data->queryDataItems([], [
            'dataCollectionId' => 'Products',
            'query' => ['limit' => 10],
        ]);

        self::assertSame('POST', $response->method);
        self::assertSame('/wix-data/v2/items/query', $response->path);
        self::assertSame('Products', $response->params->dataCollectionId);
    }

    public function test_typed_operation_throws_for_missing_required_path_params(): void
    {
        $this->expectException(UnexpectedValueException::class);

        $wix = $this->getWixClient();
        $wix->ecom->getOrder();
    }

    public function test_stores_typed_operation_sends_expected_request(): void
    {
        $wix = $this->getWixClient();

        $response = $wix->stores->queryOrders([], ['query' => ['limit' => 15]]);

        self::assertSame('POST', $response->method);
        self::assertSame('/stores/v2/orders/query', $response->path);
        self::assertSame(15, $response->params->query->limit);
    }

    public function test_pricing_plans_typed_operation_replaces_path_params(): void
    {
        $wix = $this->getWixClient();

        $response = $wix->pricing_plans->getPlan(['id' => 'plan-123']);

        self::assertSame('GET', $response->method);
        self::assertSame('/pricing-plans/v2/plans/plan-123', $response->path);
    }

    public function test_automations_typed_operation_uses_expected_path(): void
    {
        $wix = $this->getWixClient();

        $response = $wix->automations->reportEvent(['event' => ['id' => 'evt_1']]);

        self::assertSame('POST', $response->method);
        self::assertSame('/automations/v1/events/report', $response->path);
        self::assertSame('evt_1', $response->params->event->id);
    }

    public function test_notifications_typed_operation_uses_expected_path(): void
    {
        $wix = $this->getWixClient();

        $response = $wix->notifications->notify(['notification' => ['title' => 'Test']]);

        self::assertSame('POST', $response->method);
        self::assertSame('/notifications/v3/notify', $response->path);
        self::assertSame('Test', $response->params->notification->title);
    }

    public function test_site_actions_typed_operation_uses_expected_path(): void
    {
        $wix = $this->getWixClient();

        $response = $wix->site_actions->bulkDeleteSite(['siteIds' => ['site-1']]);

        self::assertSame('POST', $response->method);
        self::assertSame('/site-actions/v1/bulk/sites/delete', $response->path);
        self::assertSame('site-1', $response->params->siteIds[0]);
    }

    public function test_apps_handcrafted_resource_uses_expected_paths(): void
    {
        $wix = $this->getWixClient();

        $response = $wix->apps->getAppInstance(['instance' => 'abc']);

        self::assertSame('GET', $response->method);
        self::assertSame('/apps/v1/instance', $response->path);
        self::assertSame('abc', $response->query->instance);
    }

    public function test_oauth_app_handcrafted_resource_uses_expected_paths(): void
    {
        $wix = $this->getWixClient();

        $response = $wix->oauth_app->getOAuthApp('app_123');

        self::assertSame('GET', $response->method);
        self::assertSame('/oauth-app/v1/oauth-apps/app_123', $response->path);
    }

    public function test_domain_search_handcrafted_resource_uses_expected_paths(): void
    {
        $wix = $this->getWixClient();

        $response = $wix->domain_search->checkDomainAvailability(['query' => 'example.com']);

        self::assertSame('GET', $response->method);
        self::assertSame('/domain-search/v2/check-domain-availability', $response->path);
        self::assertSame('example.com', $response->query->query);
    }
}
