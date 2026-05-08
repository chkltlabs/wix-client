<?php

namespace Chkltlabs\WixClient\Resources;

class Pricing extends AbstractResource
{
    public function calculatePrice(array $params = []): object
    {
        return $this->sendRequest('post', 'pricing/v1/calculate-price', $params);
    }

}