<?php

namespace SoluzioneSoftware\Iubenda\Requests\Subjects;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use SoluzioneSoftware\Iubenda\Responses\SubjectsUpdateResponse;

class UpdateRequest extends AbstractRequest
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
     * @param  string  $value
     * @return $this
     */
    public function email(string $value): self
    {
        return $this->withBody('email', $value);
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function firstName(string $value): self
    {
        return $this->withBody('first_name', $value);
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function lastName(string $value): self
    {
        return $this->withBody('last_name', $value);
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function fullName(string $value): self
    {
        return $this->withBody('full_name', $value);
    }

    /**
     * Reserved field used to signal whether a subject is verified, for instance via the double opt-in method
     *
     * @param  bool  $value
     * @return $this
     */
    public function verified(bool $value): self
    {
        return $this->withBody('verified', $value);
    }

    protected function getUrl(string $path = '/'): string
    {
        return parent::getUrl("/{$this->id}");
    }

    /**
     * @return SubjectsUpdateResponse
     * @throws Exception
     * @throws GuzzleException
     */
    public function execute(): SubjectsUpdateResponse
    {
        return SubjectsUpdateResponse::create(json_decode($this->executePost()->getBody(), true));
    }
}
