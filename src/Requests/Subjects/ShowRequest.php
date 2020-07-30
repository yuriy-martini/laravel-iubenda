<?php

namespace SoluzioneSoftware\Iubenda\Requests\Subjects;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use SoluzioneSoftware\Iubenda\Objects\Subject;

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
     * @return Subject
     * @throws GuzzleException
     */
    public function execute(): Subject
    {
        $response = $this->get($this->getUrl("/{$this->id}"));

        return Subject::create(json_decode($response->getBody()));
    }
}
