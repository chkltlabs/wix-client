<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class PricingPlans extends AbstractResource
{
    protected string $segment = 'pricing-plans';

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

        return $this->sendRequest($httpMethod, 'pricing-plans/' . ltrim($path, '/'), $params);
    }

    public function archivePlan(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/plans/{id}/archive', $pathParams, $params);
    }

    public function arrangePlans(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/plans/arrange', $pathParams, $params);
    }

    public function cancelOrder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/orders/{id}/cancel', $pathParams, $params);
    }

    public function cancelOrderV2OrdersIdCancel(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/orders/{id}/cancel', $pathParams, $params);
    }

    public function clearPrimary(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/plans/clear-primary', $pathParams, $params);
    }

    public function createOfflineOrder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/checkout/orders/offline', $pathParams, $params);
    }

    public function createPlan(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/plans', $pathParams, $params);
    }

    public function getCurrentMemberOrders(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/orders/my-orders', $pathParams, $params);
    }

    public function getOfflineOrderPreview(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/checkout/orders/preview-offline', $pathParams, $params);
    }

    public function getOrder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/orders/{id}', $pathParams, $params);
    }

    public function getOrdersStats(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/orders/stats', $pathParams, $params);
    }

    public function getPlan(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/plans/{id}', $pathParams, $params);
    }

    public function getPlanStats(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/plans/stats', $pathParams, $params);
    }

    public function getPricePreview(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/orders/price-preview', $pathParams, $params);
    }

    public function getPricePreviewV2CheckoutOrdersPricePreview(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/checkout/orders/price-preview', $pathParams, $params);
    }

    public function getPurchasePreview(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/orders/preview', $pathParams, $params);
    }

    public function getSuspendableStatus(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/orders/{id}/suspendable-status', $pathParams, $params);
    }

    public function listOrders(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/orders', $pathParams, $params);
    }

    public function listPlans(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/plans', $pathParams, $params);
    }

    public function listPublicPlans(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/plans/public', $pathParams, $params);
    }

    public function makePlanPrimary(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/plans/{id}/make-primary', $pathParams, $params);
    }

    public function markAsPaid(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/orders/{id}/mark-as-paid', $pathParams, $params);
    }

    public function markOfflineOrderAsPaid(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/orders/{id}/mark-as-paid', $pathParams, $params);
    }

    public function pauseOrder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/orders/{id}/pause', $pathParams, $params);
    }

    public function postponeEndDate(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v2/orders/{id}', $pathParams, $params);
    }

    public function purchasePlan(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/orders', $pathParams, $params);
    }

    public function purchasePlanOffline(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/orders/offline', $pathParams, $params);
    }

    public function queryPublicPlans(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/plans/public/query', $pathParams, $params);
    }

    public function requestCancellation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/member/orders/{id}/cancel', $pathParams, $params);
    }

    public function resume(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/orders/{id}/resume', $pathParams, $params);
    }

    public function resumeOrder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/orders/{id}/resume', $pathParams, $params);
    }

    public function setPlanVisibility(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v2/plans/{id}/visibility', $pathParams, $params);
    }

    public function suspend(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/orders/{id}/suspend', $pathParams, $params);
    }

    public function updatePlan(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v2/plans/{plan.id}', $pathParams, $params);
    }

    public function updateValidFrom(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/orders/{id}/valid-from', $pathParams, $params);
    }

    public function updateValidUntil(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/orders/{id}/valid-until', $pathParams, $params);
    }

}