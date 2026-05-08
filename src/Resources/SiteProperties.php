<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class SiteProperties extends Domain
{
    protected string $segment = 'site-properties';

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

    public function read(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v4/properties', $pathParams, $params);
    }

    public function readProperties(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'properties', $pathParams, $params);
    }

    public function updateBusinessContact(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v4/properties/business-contact', $pathParams, $params);
    }

    public function updateBusinessContactPropertiesBusinessContact(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'properties/business-contact', $pathParams, $params);
    }

    public function updateBusinessProfile(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v4/properties/business-profile', $pathParams, $params);
    }

    public function updateBusinessProfilePropertiesBusinessProfile(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'properties/business-profile', $pathParams, $params);
    }

    public function updateBusinessSchedule(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v4/properties/business-schedule', $pathParams, $params);
    }

    public function updateBusinessSchedulePropertiesBusinessSchedule(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'properties/business-schedule', $pathParams, $params);
    }

    public function updateConsentPolicy(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v4/properties/policy', $pathParams, $params);
    }

    public function updateConsentPolicyPropertiesPolicy(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'properties/policy', $pathParams, $params);
    }

}