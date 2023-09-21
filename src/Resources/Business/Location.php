<?php

namespace Chkltlabs\WixClient\Resources\Business;

use Chkltlabs\WixClient\Resources\AbstractResource;

class Location extends AbstractResource
{
    /**
     * !!! NOTE: THIS ENDPOINT IS A DEV PREVIEW AND MAY CHANGE !!! 
     * !!! REF: https://dev.wix.com/docs/rest/api-reference/business-info/locations/list-locations !!!
     *
     * @param array $params
     */
    public function list(array $params = []): object
    {
        return $this->sendRequest(
            'get',
            'locations/v1/locations',
            $params
        );
    }

    /**
     * !!! NOTE: THIS ENDPOINT IS A DEV PREVIEW AND MAY CHANGE !!! 
     * !!! REF: https://dev.wix.com/docs/rest/api-reference/business-info/locations/get-location !!!
     *
     * @param array $params
     */
    public function get(string $locationId, array $params = []): object
    {
        return $this->sendRequest(
            'get',
            'locations/v1/locations/' . $locationId,
            $params
        );
    }

    /**
     * !!! NOTE: THIS ENDPOINT IS A DEV PREVIEW AND MAY CHANGE !!! 
     * !!! REF: https://dev.wix.com/docs/rest/api-reference/business-info/locations/create-location !!!
     *
     * @param array $params
     */
    public function create(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            'locations/v1/locations',
            $params
        );
    }

    /**
     * !!! NOTE: THIS ENDPOINT IS A DEV PREVIEW AND MAY CHANGE !!! 
     * !!! REF: https://dev.wix.com/docs/rest/api-reference/business-info/locations/update-location !!!
     *
     * @param array $params
     */
    public function update(string $locationId, array $params = []): object
    {
        return $this->sendRequest(
            'post',
            'locations/v1/locations/'.$locationId,
            $params
        );
    }

    /**
     * !!! NOTE: THIS ENDPOINT IS A DEV PREVIEW AND MAY CHANGE !!! 
     * !!! REF: https://dev.wix.com/docs/rest/api-reference/business-info/locations/query-locations !!!
     *
     * @param array $params
     */
    public function query(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            'locations/v1/locations/query',
            $params
        );
    }

    /**
     * !!! NOTE: THIS ENDPOINT IS A DEV PREVIEW AND MAY CHANGE !!! 
     * !!! REF: https://dev.wix.com/docs/rest/api-reference/business-info/locations/archive-location !!!
     *
     * @param array $params
     */
    public function archive(string $locationId, array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "locations/v1/locations/{$locationId}/archive",
            $params
        );
    }
}
