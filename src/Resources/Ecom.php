<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class Ecom extends AbstractResource
{
    protected string $segment = 'ecom';

    private function executeOperation(string $httpMethod, string $path, array $pathParams = [], array $params = []): object
    {
        if (preg_match_all('/\{([^}]+)\}/', $path, $matches) > 0 && !empty($matches[1])) {
            foreach ($matches[1] as $placeholder) {
                $pathParamKey = explode('=', $placeholder)[0];
                if (!array_key_exists($pathParamKey, $pathParams)) {
                    throw new UnexpectedValueException('Missing required path param: ' . $pathParamKey);
                }
                $path = str_replace('{' . $placeholder . '}', rawurlencode((string) $pathParams[$pathParamKey]), $path);
            }
        }

        return $this->sendRequest($httpMethod, 'ecom/' . ltrim($path, '/'), $params);
    }

    public function getAbandonedCheckout(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/abandoned-checkout/{abandonedCheckoutId}', $pathParams, $params);
    }

    public function queryAbandonedCheckouts(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/abandoned-checkout/query', $pathParams, $params);
    }

    public function addToCart(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/carts/{id}/add-to-cart', $pathParams, $params);
    }

    public function createCart(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/carts', $pathParams, $params);
    }

    public function createCheckout(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/carts/{id}/create-checkout', $pathParams, $params);
    }

    public function deleteCart(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/carts/{id}', $pathParams, $params);
    }

    public function estimateTotals(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/carts/{id}/estimate-totals', $pathParams, $params);
    }

    public function getCart(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/carts/{id}', $pathParams, $params);
    }

    public function removeCoupon(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/carts/{id}/remove-coupon', $pathParams, $params);
    }

    public function removeLineItems(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/carts/{id}/remove-line-items', $pathParams, $params);
    }

    public function updateCart(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/carts/{cartInfo.id}', $pathParams, $params);
    }

    public function updateLineItemsQuantity(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/carts/{id}/update-line-items-quantity', $pathParams, $params);
    }

    public function getCheckout(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/checkouts/{id}', $pathParams, $params);
    }

    public function createDiscountRule(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/discount-rules', $pathParams, $params);
    }

    public function deleteDiscountRule(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/discount-rules/{discountRuleId}', $pathParams, $params);
    }

    public function getDiscountRule(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/discount-rules/{discountRuleId}', $pathParams, $params);
    }

    public function queryDiscountRules(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/discount-rules/query', $pathParams, $params);
    }

    public function updateDiscountRule(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/discount-rules/{discountRule.id}', $pathParams, $params);
    }

    public function bulkCreateFulfillment(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/fulfillments/orders/bulk/create-fulfillments', $pathParams, $params);
    }

    public function createFulfillment(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/fulfillments/orders/{orderId}/create-fulfillment', $pathParams, $params);
    }

    public function deleteFulfillment(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/fulfillments/{fulfillmentId}/orders/{orderId}', $pathParams, $params);
    }

    public function listFulfillmentsForMultipleOrders(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/fulfillments/list-by-ids', $pathParams, $params);
    }

    public function listFulfillmentsForSingleOrder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/fulfillments/orders/{orderId}', $pathParams, $params);
    }

    public function updateFulfillment(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/fulfillments/{fulfillment.id}/orders/{orderId}', $pathParams, $params);
    }

    public function getOrder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/orders/{id}', $pathParams, $params);
    }

}