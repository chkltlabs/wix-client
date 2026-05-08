<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class EmailMarketing extends AbstractResource
{
    protected string $segment = 'email-marketing';

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

        return $this->sendRequest($httpMethod, 'email-marketing/' . ltrim($path, '/'), $params);
    }

    public function archive(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/campaigns/{campaignId}/archive', $pathParams, $params);
    }

    public function deleteOperation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/campaigns/{campaignId}', $pathParams, $params);
    }

    public function getOperation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/account-details', $pathParams, $params);
    }

    public function getOperationV1CampaignsCampaignid(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/campaigns/{campaignId}', $pathParams, $params);
    }

    public function getOperationV1SenderDetails(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/sender-details', $pathParams, $params);
    }

    public function list(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/campaigns', $pathParams, $params);
    }

    public function listRecipients(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/campaigns/{campaignId}/statistics/recipients', $pathParams, $params);
    }

    public function listStatistics(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/campaigns/statistics', $pathParams, $params);
    }

    public function pauseScheduling(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/campaigns/{campaignId}/pause-scheduling', $pathParams, $params);
    }

    public function publish(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/campaigns/{campaignId}/publish', $pathParams, $params);
    }

    public function resendToNonOpeners(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/campaigns/{campaignId}/resend', $pathParams, $params);
    }

    public function resolveActualFromAddress(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/sender-details/actual-from-address', $pathParams, $params);
    }

    public function reuse(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/campaigns/{campaignId}/reuse', $pathParams, $params);
    }

    public function sendTest(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/campaigns/{campaignId}/test', $pathParams, $params);
    }

    public function unarchive(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/campaigns/{campaignId}/unarchive', $pathParams, $params);
    }

    public function update(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/sender-details', $pathParams, $params);
    }

    public function verifyEmail(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/sender-details/verify-email', $pathParams, $params);
    }

    public function bulkUpsertEmailSubscription(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/email-subscriptions/bulk', $pathParams, $params);
    }

    public function generateUnsubscribeLink(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/email-subscriptions/unsubscribe-link', $pathParams, $params);
    }

    public function queryEmailSubscriptions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/email-subscriptions/query', $pathParams, $params);
    }

    public function upsertEmailSubscription(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/email-subscriptions', $pathParams, $params);
    }

}