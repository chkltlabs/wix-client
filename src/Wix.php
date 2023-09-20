<?php

namespace Chkltlabs\WixClient;

use Chkltlabs\WixClient\Resources\AbstractResource;
use Chkltlabs\WixClient\Traits\HasCachedResources;
use Shuttle\Shuttle;
use Psr\Http\Client\ClientInterface;

/**
 * @property Chkltlabs\WixClient\Resources\Blog $blog
 * 
 */
class Wix
{
	use HasCachedResources;

	/**
	 * ClientInterface instance.
	 *
	 * @var ClientInterface|null
	 */
	protected $httpClient;

	/**
	 * Resource instance cache.
	 *
	 * @var array<AbstractResource>
	 */
	public array $resource_cache = [];

    public function __construct(
        public string $api_key,
        public string $api_host_url,
        public string $account_id,
        public string $site_id,
    )
    {
        
    }

	/**
	 * Set a specific ClientInterface instance to be used to make HTTP calls.
	 *
	 * @param ClientInterface $httpClient
	 * @return void
	 */
	public function setHttpClient(ClientInterface $httpClient): void
	{
		$this->httpClient = $httpClient;
	}

	/**
	 * Get the ClientInterface instance being used to make HTTP calls.
	 *
	 * @return ClientInterface
	 */
	public function getHttpClient(): ClientInterface
	{
		if( empty($this->httpClient) ){
			$this->httpClient = new Shuttle();
		}

		return $this->httpClient;
	}
}