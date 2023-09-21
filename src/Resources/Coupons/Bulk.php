<?php

namespace Chkltlabs\WixClient\Resources\Coupons;

use Chkltlabs\WixClient\Resources\AbstractResource;

class Bulk extends AbstractResource
{
    public function create(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "stores/v2/bulk/coupons/create",
            $params
        );
    }

    public function delete(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "stores/v2/bulk/coupons/delete",
            $params
        );
    }
}