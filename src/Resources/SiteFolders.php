<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class SiteFolders extends Domain
{
    protected string $segment = 'site-folders';

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

    public function createFolder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/folders', $pathParams, $params);
    }

    public function deleteFolder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v2/folders/{id}', $pathParams, $params);
    }

    public function getFolderBySite(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/folders/sites/{siteId}', $pathParams, $params);
    }

    public function moveFolders(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v2/folders/bulk/move', $pathParams, $params);
    }

    public function moveSitesToFolder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/folders/bulk/sites/move', $pathParams, $params);
    }

    public function queryFolders(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/folders/query', $pathParams, $params);
    }

    public function updateFolder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v2/folders/{folder.id}', $pathParams, $params);
    }

}