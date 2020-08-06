<?php

namespace SoluzioneSoftware\Iubenda\Requests;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractRequest
{
    const BASE_URL = 'https://consent.iubenda.com';

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var array
     */
    protected $body = [];

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
        Arr::set($this->body, $key, $value);
        return $this;
    }

    protected function getUrl(string $path = '/'): string
    {
        return static::BASE_URL . $path;
    }

    protected function getHeaders(): array
    {
        return [
            'ApiKey' => Config::get('iubenda.consent_solution.api_key'),
        ];
    }

    protected function getBody(): array
    {
        return $this->body;
    }

    /**
     * @param  string  $url
     * @return ResponseInterface
     * @throws GuzzleException
     */
    protected function get(string $url): ResponseInterface
    {
        return $this->client->get($url);
    }

    /**
     * @param  string  $url
     * @return ResponseInterface
     * @throws GuzzleException
     */
    protected function post(string $url): ResponseInterface
    {
        return $this->client->post($url, [
            'headers' => $this->getHeaders(),
            RequestOptions::JSON => $this->getBody(),
        ]);
    }

    /**
     * @param  string  $url
     * @return ResponseInterface
     * @throws GuzzleException
     */
    protected function put(string $url): ResponseInterface
    {
        return $this->client->put($url);
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    protected function executePost(): ResponseInterface
    {
        return $this->post($this->getUrl());
    }
}
