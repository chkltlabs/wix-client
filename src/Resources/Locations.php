<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class Locations extends Domain
{
    protected string $segment = 'locations';

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

    public function archiveLocation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/locations/{id}/archive', $pathParams, $params);
    }

    public function createLocation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/locations', $pathParams, $params);
    }

    public function getLocation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/locations/{id}', $pathParams, $params);
    }

    public function listLocations(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/locations', $pathParams, $params);
    }

    public function queryLocations(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/locations/query', $pathParams, $params);
    }

    public function setDefaultLocation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/locations/{id}/set-default', $pathParams, $params);
    }

    public function updateLocation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/locations/{location.id}', $pathParams, $params);
    }

}