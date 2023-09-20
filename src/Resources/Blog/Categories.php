<?php

namespace Chkltlabs\WixClient\Resources\Blog;

use Chkltlabs\WixClient\Resources\AbstractResource;

class Categories extends AbstractResource 
{
    public function list(array $params = [])
    {
        return $this->sendRequest(
            'get',
            'v3/categories',
            $params
        );
    }

    public function get(string $categoryId, array $params = [])
    {
        return $this->getByID($categoryId, $params);
    }

    public function getByID(string $categoryId, array $params = [])
    {
        return $this->sendRequest(
            'get',
            "v3/categories/{$categoryId}",
            $params
        );
    }

    public function getBySlug(string $slug, array $params = [])
    {
        return $this->sendRequest(
            'get',
            "v3/categories/slugs/{$slug}",
            $params
        );
    }

    public function create(array $params = [])
    {
        return $this->sendRequest(
            'post',
            'v3/categories',
            $params
        );
    }

    public function update(string $categoryId, array $params = [])
    {
        return $this->sendRequest(
            'patch',
            "v3/categories/{$categoryId}",
            $params
        );
    }

    public function delete(string $categoryId, array $params = [])
    {
        return $this->sendRequest(
            'delete',
            "v3/categories/{$categoryId}",
            $params
        );
    }

    public function query(array $params = [])
    {
        return $this->sendRequest(
            'post',
            'v3/categories',
            $params
        );
    }
}