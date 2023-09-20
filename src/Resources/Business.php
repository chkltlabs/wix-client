<?php

namespace Chkltlabs\WixClient\Resources;

use Chkltlabs\WixClient\Traits\HasCachedResources;

/**
 * @property Chkltlabs\WixClient\Resources\Business\Properties $properties
 * @property Chkltlabs\WixClient\Resources\Business\Location $location
 * 
 */
class Business extends AbstractResource 
{
    use HasCachedResources;
}