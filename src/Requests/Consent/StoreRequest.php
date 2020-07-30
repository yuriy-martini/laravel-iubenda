<?php

namespace SoluzioneSoftware\Iubenda\Requests\Consent;

use Carbon\Carbon;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use SoluzioneSoftware\Iubenda\Responses\ConsentStoreResponse;

class StoreRequest extends AbstractRequest
{
    /**
     * ISO 8601 timestamp at which the consent occurred<br>
     * auto-filled if not provided
     *
     * @param  Carbon  $value
     * @return $this
     */
    public function timestamp(Carbon $value): self
    {
        throw new Exception('Not implemented');
    }

    /**
     * auto-filled if not provided
     *
     * @param  string  $value
     * @return $this
     */
    public function subjectId(string $value): self
    {
        throw new Exception('Not implemented');
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function subjectEmail(string $value): self
    {
        throw new Exception('Not implemented');
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function subjectFirstName(string $value): self
    {
        throw new Exception('Not implemented');
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function subjectLastName(string $value): self
    {
        throw new Exception('Not implemented');
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function subjectFullName(string $value): self
    {
        throw new Exception('Not implemented');
    }

    /**
     * Reserved field used to signal whether a subject is verified, for instance via the double opt-in method
     *
     * @param  bool  $value
     * @return $this
     */
    public function subjectVerified(bool $value): self
    {
        throw new Exception('Not implemented');
    }

    /**
     * @param  string  $identifier privacy_policy, cookie_policy, term or a custom identifier
     * @param  string|null  $version auto-filled if not provided
     * @return $this
     */
    public function legalNotice(string $identifier, string $version = null): self
    {
        throw new Exception('Not implemented');
    }

    /**
     * @param  string  $content
     * @param  string  $form
     * @return $this
     */
    public function proof(string $content, string $form): self
    {
        throw new Exception('Not implemented');
    }

    /**
     * Preferences for the consent action
     *
     * @param  string  $key
     * @param  string  $value
     * @return $this
     */
    public function preference(string $key, string $value): self
    {
        throw new Exception('Not implemented');
    }

    /**
     * Saves the passed IP address on the Consent.
     * Default null
     *
     * @param  string  $value
     * @return $this
     */
    public function ipAddress(string $value): self
    {
        throw new Exception('Not implemented');
    }

    /**
     * @return ConsentStoreResponse
     * @throws GuzzleException
     * @throws Exception
     */
    public function execute(): ConsentStoreResponse
    {
        $response = $this->post($this->getUrl());

        return ConsentStoreResponse::create(json_decode($response->getBody()));
    }
}
