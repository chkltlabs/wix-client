<?php

namespace Chkltlabs\WixClient\Resources;

use Chkltlabs\WixClient\Traits\HasCachedResources;

class Coupons extends AbstractResource 
{
    use HasCachedResources;
    
    public function get(string $id, array $params = []): object
    {
        return $this->sendRequest(
            'get',
            "stores/v2/coupons/".$id,
            $params
        );
    }

    public function create(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "stores/v2/coupons",
            $params
        );
    }

    public function update(string $id, array $params = []): object
    {
        return $this->sendRequest(
            'patch',
            "stores/v2/coupons/".$id,
            $params
        );
    }

    public function delete(string $id, array $params = []): object
    {
        return $this->sendRequest(
            'delete',
            "stores/v2/coupons/".$id,
            $params
        );
    }

    public function query(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "stores/v2/coupons/query",
            $params
        );
    }
}