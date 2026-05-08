<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class Progallery extends AbstractResource
{
    protected string $segment = 'progallery';

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

        return $this->sendRequest($httpMethod, 'progallery/' . ltrim($path, '/'), $params);
    }

    public function createGallery(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/galleries', $pathParams, $params);
    }

    public function createGalleryItem(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/galleries/{galleryId}/items', $pathParams, $params);
    }

    public function deleteGallery(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v2/galleries/{galleryId}', $pathParams, $params);
    }

    public function deleteGalleryItem(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v2/galleries/{galleryId}/items/{itemId}', $pathParams, $params);
    }

    public function getGallery(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/galleries/{galleryId}', $pathParams, $params);
    }

    public function getGalleryItem(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/galleries/{galleryId}/items/{itemId}', $pathParams, $params);
    }

    public function listGalleries(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/galleries', $pathParams, $params);
    }

    public function listGalleryItems(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/galleries/{galleryId}/items', $pathParams, $params);
    }

    public function updateGallery(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v2/galleries/{gallery.id}', $pathParams, $params);
    }

    public function updateGalleryItem(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v2/galleries/{galleryId}/items/{item.id}', $pathParams, $params);
    }

}