<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class Payments extends Domain
{
    protected string $segment = 'payments';

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

        return $this->request($httpMethod, $path, $params);
    }

    public function submitEvent(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/provider-platform-events', $pathParams, $params);
    }

    public function acceptDispute(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/transactions/{transactionId}/disputes/{disputeId}/accept', $pathParams, $params);
    }

    public function addEvidence(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/transactions/{transactionId}/disputes/{disputeId}/add-evidence', $pathParams, $params);
    }

    public function captureTransaction(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/transactions/{transactionId}/capture', $pathParams, $params);
    }

    public function createTransaction(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/transactions', $pathParams, $params);
    }

    public function generateEvidenceUploadUrl(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/transactions/{transactionId}/disputes/{disputeId}/generate-evidence-upload-url', $pathParams, $params);
    }

    public function getTransaction(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v3/transactions/{transactionId}', $pathParams, $params);
    }

    public function submitEvidence(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/transactions/{transactionId}/disputes/{disputeId}/submit-evidence', $pathParams, $params);
    }

    public function voidOrRefundTransaction(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/transactions/{transactionId}/refund', $pathParams, $params);
    }

}