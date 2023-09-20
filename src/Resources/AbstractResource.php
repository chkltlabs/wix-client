<?php

namespace Chkltlabs\WixClient\Resources;

use Chkltlabs\WixClient\WixRequestException;
use Capsule\Request;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use UnexpectedValueException;

abstract class AbstractResource
{
    /**
	 * @param ClientInterface $httpClient
	 * @param string $client_id
	 * @param string $client_secret
	 * @param string $api_host_url
	 */
	public function __construct(
		protected ClientInterface $httpClient,
        protected string $api_key,
        protected string $account_id,
        protected string $site_id,
		protected string $api_host_url
        )
	{
        //...
    }

	/**
	 * Build headers with bearer token.
	 *
	 * @param array<array-key,mixed> $headers
	 * @return array
	 */
    protected function headersWithBearerToken(array $headers = []): array
    {
		return \array_merge([
			"Authorization" => $this->api_key,
            "wix-account-id" => $this->account_id,
            "wix-site-id" => $this->site_id,
		], $headers);

    }

	/**
	 * Send a request and parse the response.
	 *
	 * @param string $method
	 * @param string $path
	 * @param array<array-key,mixed> $params
	 * @throws PlaidRequestException
	 * @throws UnexpectedValueException
	 * @return object
	 */
	protected function sendRequest(string $method, string $path, array $params = []): object
	{
		$response = $this->sendRequestRawResponse($method, $path, $params);

		$payload = \json_decode($response->getBody()->getContents());

		if( \json_last_error() !== JSON_ERROR_NONE ){
			throw new UnexpectedValueException("Invalid JSON response returned by Plaid");
		}

		return (object) $payload;
	}

	/**
	 * Make an HTTP request and get back the ResponseInterface instance.
	 *
	 * @param string $method
	 * @param string $path
	 * @param array<array-key,mixed> $params
	 * @throws WixRequestException
	 * @return ResponseInterface
	 */
	protected function sendRequestRawResponse(string $method, string $path, array $params = []): ResponseInterface
	{
		$response = $this->httpClient->sendRequest(
			$this->buildRequest($method, $path, $params)
		);

		if( $response->getStatusCode() < 200 || $response->getStatusCode() >= 300 ){
			throw new WixRequestException($response);
		}

		return $response;
	}

	/**
	 * Build the RequestInterface instance to be sent by the HttpClientInterface instance.
	 *
	 * @param string $method
	 * @param string $path
	 * @param array<array-key,mixed> $params
	 * @return RequestInterface
	 */
	protected function buildRequest(string $method, string $path, array $params = []): RequestInterface
	{
        $path = \trim($this->api_host_url, '/').'/'.\trim($path, '/');
        $path .= ( strtolower($method) == 'get' ? '?'.http_build_query($params) : '');
        $body = ( strtolower($method) == 'get' ? null : \json_encode((object) $params));
        return new Request(
            $method,
            $path,
            $body,
            $this->headersWithBearerToken([
                'Content-Type' => 'application/json',
            ])
        );
	}
}