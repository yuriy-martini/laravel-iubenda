<?php

namespace SoluzioneSoftware\Iubenda\Requests\Consent;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use SoluzioneSoftware\Iubenda\Objects\Consent;

class ShowRequest extends AbstractRequest
{
    /**
     * @var string
     */
    private $id;

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    /**
     * @return Consent
     * @throws GuzzleException
     * @throws Exception
     */
    public function execute(): Consent
    {
        $response = $this->get($this->getUrl("/{$this->id}"));

        return Consent::create(json_decode($response->getBody()));
    }
}
