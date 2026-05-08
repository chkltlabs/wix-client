<?php

namespace Chkltlabs\WixClient\Resources;

class Domain extends AbstractResource
{
    protected string $segment = '';

    public function request(string $method, string $path = '', array $params = []): object
    {
        return $this->sendRequest($method, $this->normalizePath($path), $params);
    }

    public function get(string $path = '', array $params = []): object
    {
        return $this->request('get', $path, $params);
    }

    public function post(string $path = '', array $params = []): object
    {
        return $this->request('post', $path, $params);
    }

    public function put(string $path = '', array $params = []): object
    {
        return $this->request('put', $path, $params);
    }

    public function patch(string $path = '', array $params = []): object
    {
        return $this->request('patch', $path, $params);
    }

    public function delete(string $path = '', array $params = []): object
    {
        return $this->request('delete', $path, $params);
    }

    private function normalizePath(string $path): string
    {
        if ($this->segment === '') {
            return \ltrim($path, '/');
        }

        $path = \trim($path);
        if ($path === '') {
            return $this->segment;
        }

        if (\preg_match('/^https?:\/\//i', $path) === 1) {
            $parsed = \parse_url($path);
            if (\is_array($parsed) && isset($parsed['path'])) {
                $normalized = \ltrim($parsed['path'], '/');
                if (isset($parsed['query']) && $parsed['query'] !== '') {
                    $normalized .= '?' . $parsed['query'];
                }
                return $normalized;
            }
        }

        $normalizedPath = \ltrim($path, '/');
        if (\str_starts_with($normalizedPath, $this->segment . '/')
            || $normalizedPath === $this->segment
        ) {
            return $normalizedPath;
        }

        return $this->segment . '/' . $normalizedPath;
    }
}
