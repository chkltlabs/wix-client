<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class Chat extends AbstractResource
{
    protected string $segment = 'chat';

    private function executeOperation(string $httpMethod, string $path, array $pathParams = [], array $params = []): object
    {
        if (preg_match_all('/\{([^}]+)\}/', $path, $matches) > 0 && !empty($matches[1])) {
            foreach ($matches[1] as $placeholder) {
                $pathParamKey = explode('=', $placeholder)[0];
                if (!array_key_exists($pathParamKey, $pathParams)) {
                    throw new UnexpectedValueException('Missing required path param: ' . $pathParamKey);
                }
                $path = str_replace('{' . $placeholder . '}', rawurlencode((string) $pathParams[$pathParamKey]), $path);
            }
        }

        return $this->sendRequest($httpMethod, 'chat/' . ltrim($path, '/'), $params);
    }

    public function sendMessage(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'api/v1/inbox-chat/messaging/send-message', $pathParams, $params);
    }

    public function sendMessageV1ChannelsChannelidMessages(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/channels/{channelId}/messages', $pathParams, $params);
    }

}