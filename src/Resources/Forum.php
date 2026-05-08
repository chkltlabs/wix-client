<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class Forum extends AbstractResource
{
    protected string $segment = 'forum';

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

        return $this->sendRequest($httpMethod, 'forum/' . ltrim($path, '/'), $params);
    }

    public function getCategory(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/categories/{categoryId}', $pathParams, $params);
    }

    public function getCategoryBySlug(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/categories/slugs/{slug}', $pathParams, $params);
    }

    public function getPost(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/posts/{postId}', $pathParams, $params);
    }

    public function getPostBySlug(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/posts/slugs/{slug}', $pathParams, $params);
    }

    public function queryCategories(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/categories/query', $pathParams, $params);
    }

    public function queryPosts(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/posts/query', $pathParams, $params);
    }

}