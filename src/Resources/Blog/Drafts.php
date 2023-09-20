<?php

namespace Chkltlabs\WixClient\Resources\Blog;

use Chkltlabs\WixClient\Resources\AbstractResource;

class Drafts extends AbstractResource 
{
    public function list(array $params = [])
    {
        return $this->sendRequest(
            'get',
            'blog/v3/draft-posts',
            $params
        );
    }

    public function get(string $draftPostId, array $params = [])
    {
        return $this->sendRequest(
            'get',
            "blog/v3/draft-posts/{$draftPostId}",
            $params
        );
    }

    public function create(array $params = [])
    {
        return $this->sendRequest(
            'post',
            'blog/v3/draft-posts',
            $params
        );
    }

    public function update(string $draftPostId, array $params = [])
    {
        return $this->sendRequest(
            'patch',
            "blog/v3/draft-posts/{$draftPostId}",
            $params
        );
    }

    public function bulkUpdate(array $params = [])
    {
        return $this->sendRequest(
            'patch',
            'blog/v3/draft-posts/update',
            $params
        );
    }

    public function delete(string $draftPostId, array $params = [])
    {
        return $this->sendRequest(
            'delete',
            "blog/v3/draft-posts/{$draftPostId}",
            $params
        );
    }

    public function listDeleted(array $params = [])
    {
        return $this->sendRequest(
            'get',
            'blog/v3/draft-posts/trash-bin',
            $params
        );
    }

    public function getDeleted(string $draftPostId, array $params = [])
    {
        return $this->sendRequest(
            'get',
            "blog/v3/draft-posts/trash-bin/{$draftPostId}",
            $params
        );
    }

    public function removeDeleted(string $draftPostId, array $params = [])
    {
        return $this->sendRequest(
            'delete',
            "blog/v3/draft-posts/trash-bin/{$draftPostId}",
            $params
        );
    }

    public function restoreDeleted(string $draftPostId, array $params = [])
    {
        return $this->sendRequest(
            'post',
            "blog/v3/draft-posts/trash-bin/{$draftPostId}/restore",
            $params
        );
    }

    public function query(array $params = [])
    {
        return $this->sendRequest(
            'post',
            "blog/v3/draft-posts/query",
            $params
        );
    }

    public function publish(string $draftPostId, array $params = [])
    {
        return $this->sendRequest(
            'post',
            "blog/v3/draft-posts/{$draftPostId}/publish",
            $params
        );
    }

}