<?php

namespace Chkltlabs\WixClient\Objects;

abstract class AbstractObject
{
    //only planned functionality for objects is validation

    //each object should be able to define a structure, 
    //and check a complex input array for compliance.

    //reasonably unlimited nesting while using standardized
    //symfony validation (a-la laravel :) ) - Illuminate/Validation;

    //possible to also include parsing responses into objects,
    //if response validation is called for, or to allow 
    //intuitive editing of objects programatically
    
}