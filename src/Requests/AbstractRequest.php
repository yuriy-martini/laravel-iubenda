<?php

namespace SoluzioneSoftware\Iubenda\Requests;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractRequest
{
    const BASE_URL = 'https://consent.iubenda.com';
    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function withQuery(string $key, string $value): self
    {
        throw new Exception('Not implemented');
    }

    /**
     * @param  string  $key
     * @param  string|array  $value
     * @return $this
     */
    protected function withBody(string $key, $value): self
    {
        throw new Exception('Not implemented');
    }

    protected function getUrl(string $path = '/')
    {
        return static::BASE_URL . $path;
    }

    /**
     * @param  string  $url
     * @return ResponseInterface
     * @throws GuzzleException
     */
    protected function get(string $url)
    {
        return $this->client->get($url);
    }

    /**
     * @param  string  $url
     * @return ResponseInterface
     * @throws GuzzleException
     */
    protected function post(string $url)
    {
        return $this->client->post($url);
    }

    /**
     * @param  string  $url
     * @return ResponseInterface
     * @throws GuzzleException
     */
    protected function put(string $url)
    {
        return $this->client->put($url);
    }
}
