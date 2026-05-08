<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class MarketingConsent extends AbstractResource
{
    protected string $segment = 'marketing-consent';

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

        return $this->sendRequest($httpMethod, 'marketing-consent/' . ltrim($path, '/'), $params);
    }

    public function bulkUpsertMarketingConsent(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bulk/marketing-consent/upsert', $pathParams, $params);
    }

    public function createMarketingConsent(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/marketing-consent', $pathParams, $params);
    }

    public function deleteMarketingConsent(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/marketing-consent/{marketingConsentId}', $pathParams, $params);
    }

    public function getMarketingConsent(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/marketing-consent/{marketingConsentId}', $pathParams, $params);
    }

    public function getMarketingConsentByIdentifier(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/marketing-consent/get-by', $pathParams, $params);
    }

    public function queryMarketingConsent(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/marketing-consent/query', $pathParams, $params);
    }

    public function removeMarketingConsent(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/marketing-consent/remove', $pathParams, $params);
    }

    public function updateMarketingConsent(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/marketing-consent/{marketingConsent.id}', $pathParams, $params);
    }

    public function upsertMarketingConsent(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/marketing-consent/upsert', $pathParams, $params);
    }

}