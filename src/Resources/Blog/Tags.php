<?php

namespace Chkltlabs\WixClient\Resources\Blog;

use Chkltlabs\WixClient\Resources\AbstractResource;

class Tags extends AbstractResource 
{
    public function get(string $tagId, array $params = []): object
    {
        return $this->getById($tagId, $params);
    }

    public function getById(string $tagId, array $params = []): object
    {
        return $this->sendRequest(
            'get',
            "v3/tags/{$tagId}",
            $params
        );
    }

    public function getByLabel(string $label, array $params = []): object
    {
        return $this->sendRequest(
            'get',
            "v3/tags/labels/{$label}",
            $params
        );
    }

    public function getBySlug(string $slug, array $params = []): object
    {
        return $this->sendRequest(
            'get',
            "v3/tags/slugs/{$slug}",
            $params
        );
    }

    public function delete(string $tagId, array $params = []): object
    {
        return $this->sendRequest(
            'delete',
            "v3/tags/{$tagId}",
            $params
        );
    }

     /**
     * !!! NOTE: THIS ENDPOINT IS A DEV PREVIEW AND MAY CHANGE !!! 
     * !!! REF: https://dev.wix.com/docs/rest/api-reference/wix-blog/blog/tags/query-tags !!!
     *
     * @param array $params
     */
    public function query(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            'v3/tags/query',
            $params
        );
    }
}