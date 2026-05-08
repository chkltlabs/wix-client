<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class LoyaltyAccounts extends Domain
{
    protected string $segment = 'loyalty-accounts';

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

    public function adjustPoints(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/accounts/{accountId}/adjust-points', $pathParams, $params);
    }

    public function createAccount(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/accounts', $pathParams, $params);
    }

    public function earnPoints(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/accounts/{accountId}/earn-points', $pathParams, $params);
    }

    public function getAccount(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/accounts/{id}', $pathParams, $params);
    }

    public function getAccountBySecondaryId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/accounts/fetch-by', $pathParams, $params);
    }

    public function getProgramTotals(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/accounts/program-totals', $pathParams, $params);
    }

    public function getTransaction(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/transactions/{id}', $pathParams, $params);
    }

    public function listAccounts(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/accounts', $pathParams, $params);
    }

    public function listTransactions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/accounts/{accountId}/transactions', $pathParams, $params);
    }

}