<?php

namespace Chkltlabs\WixClient\Resources\Business;

use Chkltlabs\WixClient\Resources\AbstractResource;

class Properties extends AbstractResource
{
    public function get(array $params = []): object
    {
        return $this->sendRequest(
            'get',
            'site-properties/v4/properties',
            $params
        );
    }

    /**
     * !!! NOTE: THIS ENDPOINT IS A DEV PREVIEW AND MAY CHANGE !!! 
     * !!! REF: https://dev.wix.com/docs/rest/api-reference/business-info/site-properties/properties/update-business-profile !!!
     *
     * @param array $params
     */
    public function updateProfile(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            'site-properties/v4/properties/business-profile',
            $params
        );
    }

    /**
     * !!! NOTE: THIS ENDPOINT IS A DEV PREVIEW AND MAY CHANGE !!! 
     * !!! REF: https://dev.wix.com/docs/rest/api-reference/business-info/site-properties/properties/update-business-contact !!!
     *
     * @param array $params
     */
    public function updateContact(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            'site-properties/v4/properties/business-contact',
            $params
        );
    }

    /**
     * !!! NOTE: THIS ENDPOINT IS A DEV PREVIEW AND MAY CHANGE !!! 
     * !!! REF: https://dev.wix.com/docs/rest/api-reference/business-info/site-properties/properties/update-business-schedule !!!
     *
     * @param array $params
     */
    public function updateSchedule(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            'site-properties/v4/properties/business-schedule',
            $params
        );
    }

    /**
     * !!! NOTE: THIS ENDPOINT IS A DEV PREVIEW AND MAY CHANGE !!! 
     * !!! REF: https://dev.wix.com/docs/rest/api-reference/business-info/site-properties/properties/update-consent-policy !!!
     *
     * @param array $params
     */
    public function updatePolicy(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            'site-properties/v4/properties/policy',
            $params
        );
    }
}
