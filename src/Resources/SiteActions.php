<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class SiteActions extends Domain
{
    protected string $segment = 'site-actions';

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

    public function bulkDeleteSite(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bulk/sites/delete', $pathParams, $params);
    }

}