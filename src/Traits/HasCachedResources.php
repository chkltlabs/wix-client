<?php

namespace Chkltlabs\WixClient\Traits;

use Chkltlabs\WixClient\Resources\AbstractResource;
use ReflectionClass;
use UnexpectedValueException;

trait HasCachedResources 
{
    public array $resource_cache = [];

    /**
	 * Magic getter for resources.
	 *
	 * @param string $resource
	 * @throws UnexpectedValueException
	 * @return AbstractResource
	 */
    public function __get(string $resource): AbstractResource
    {
        if( !isset($this->resource_cache[$resource]) ){

			$resource = \str_replace([" "], "", \ucwords(\str_replace(["_"], " ", $resource)));

			// $resource_class = "App\\Services\\WixService\\Resources\\" . $resource;
			$resource_class = $this->getResourceNamespace() . $resource;

			if( !\class_exists($resource_class) ){
				throw new UnexpectedValueException("Unknown Wix resource: {$resource} : {$resource_class}");
			}

			$reflectionClass = new ReflectionClass($resource_class);

			/**
			 * @var AbstractResource $resource_instance
			 */
			$resource_instance = $reflectionClass->newInstanceArgs([
				$this->httpClient ?? $this->getHttpClient(),
                $this->api_key,
                $this->account_id,
                $this->site_id,
                $this->api_host_url
			]);

			$this->resource_cache[$resource] = $resource_instance;
		}

		return $this->resource_cache[$resource];
    }

	private function getResourceNamespace(): string
	{
		$class = get_class($this);
		$parts = explode('\\', $class);
		if (!in_array('Resources', $parts)){
			return "Chkltlabs\\WixClient\\Resources\\";
		}
		return $class.'\\';
	}
}