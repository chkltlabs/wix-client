<?php

namespace Chkltlabs\WixClient\Resources;

use Chkltlabs\WixClient\Traits\HasCachedResources;

class Comments extends AbstractResource 
{
    public function get(string $id, array $params = []): object
    {
        return $this->sendRequest(
            'get',
            "comments/v1/comments/".$id,
            $params
        );
    }

    public function create(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "comments/v1/comments",
            $params
        );
    }

    public function update(string $id, array $params = []): object
    {
        return $this->sendRequest(
            'patch',
            "comments/v1/comments/".$id,
            $params
        );
    }

    public function delete(string $id, array $params = []): object
    {
        return $this->sendRequest(
            'delete',
            "comments/v1/comments/".$id,
            $params
        );
    }

    public function query(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "comments/v1/comments/query-cursor",
            $params
        );
    }

    public function mark(string $id, array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "comments/v1/comments/".$id."/mark",
            $params
        );
    }

    public function unmark(string $id, array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "comments/v1/comments/".$id."/unmark",
            $params
        );
    }

    public function count(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "comments/v1/comments/count",
            $params
        );
    }
}