<?php

namespace SoluzioneSoftware\Iubenda\Requests\LegalNotices;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use SoluzioneSoftware\Iubenda\Objects\LegalNotice;

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
     * @return LegalNotice
     * @throws GuzzleException
     * @throws Exception
     */
    public function execute(): LegalNotice
    {
        $response = $this->get($this->getUrl("/{$this->id}"));

        return LegalNotice::create(json_decode($response->getBody()));
    }
}
