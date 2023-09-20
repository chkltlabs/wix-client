<?php

namespace Chkltlabs\WixClient\Resources\Blog;

use Chkltlabs\WixClient\Resources\AbstractResource;

class Posts extends AbstractResource
{
    public function list(array $params = [])
    {
        return $this->sendRequest(
            'get',
            "v3/posts",
            $params
        );
    }
    public function get(string $tagId, array $params = [])
    {
        return $this->getById($tagId, $params);
    }

    public function getById(string $postId, array $params = [])
    {
        return $this->sendRequest(
            'get',
            "v3/posts/{$postId}",
            $params
        );
    }

    public function getBySlug(string $slug, array $params = [])
    {
        return $this->sendRequest(
            'get',
            "v3/posts/slugs/{$slug}",
            $params
        );
    }

    public function query(array $params = [])
    {
        return $this->sendRequest(
            'post',
            "v3/posts/query",
            $params
        );
    }

    public function metrics(string $postId, array $params = [])
    {
        return $this->sendRequest(
            'get',
            "v3/posts/{$postId}/metrics",
            $params
        );
    }

    public function count(array $params = [])
    {
        return $this->sendRequest(
            'get',
            "v2/stats/post/count",
            $params
        );
    }

    public function total(array $params = [])
    {
        return $this->sendRequest(
            'get',
            "v2/stats/posts/total",
            $params
        );
    }



}