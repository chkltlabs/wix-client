<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class Resellers extends Domain
{
    protected string $segment = 'resellers';

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

    public function adjustProductInstanceSpecifications(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/packages/product-instances/{instanceId}', $pathParams, $params);
    }

    public function assignProductInstanceToSite(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/packages/product-instances/{instanceId}/{siteId}', $pathParams, $params);
    }

    public function cancelPackage(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/packages/{id}', $pathParams, $params);
    }

    public function cancelProductInstance(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/packages/product-instances/{instanceId}', $pathParams, $params);
    }

    public function createPackage(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/packages', $pathParams, $params);
    }

    public function createPackageV2(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/packages', $pathParams, $params);
    }

    public function getPackage(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/packages/{id}', $pathParams, $params);
    }

    public function queryPackages(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/packages/query', $pathParams, $params);
    }

    public function unassignProductInstanceFromSite(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/packages/product-instances/{instanceId}/unassign', $pathParams, $params);
    }

}