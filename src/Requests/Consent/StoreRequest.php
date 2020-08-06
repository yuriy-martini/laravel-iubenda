<?php

namespace SoluzioneSoftware\Iubenda\Requests\Consent;

use Carbon\Carbon;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use SoluzioneSoftware\Iubenda\Responses\ConsentStoreResponse;

class StoreRequest extends AbstractRequest
{
    /**
     * @var array
     */
    protected $legalNotices = [];

    /**
     * @var array
     */
    protected $proofs = [];

    /**
     * ISO 8601 timestamp at which the consent occurred<br>
     * auto-filled if not provided
     *
     * @param  Carbon  $value
     * @return $this
     */
    public function timestamp(Carbon $value): self
    {
        return $this->withBody('timestamp', $value->toIso8601ZuluString());
    }

    /**
     * auto-filled if not provided
     *
     * @param  string  $value
     * @return $this
     */
    public function subjectId(string $value): self
    {
        return $this->withBody('subject.id', $value);
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function subjectEmail(string $value): self
    {
        return $this->withBody('subject.email', $value);
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function subjectFirstName(string $value): self
    {
        return $this->withBody('subject.first_name', $value);
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function subjectLastName(string $value): self
    {
        return $this->withBody('subject.last_name', $value);
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function subjectFullName(string $value): self
    {
        return $this->withBody('subject.full_name', $value);
    }

    /**
     * Reserved field used to signal whether a subject is verified, for instance via the double opt-in method
     *
     * @param  bool  $value
     * @return $this
     */
    public function subjectVerified(bool $value): self
    {
        return $this->withBody('subject.verified', $value);
    }

    /**
     * @param  string  $identifier privacy_policy, cookie_policy, term or a custom identifier
     * @param  string|null  $version auto-filled if not provided
     * @return $this
     */
    public function legalNotice(string $identifier, string $version = null): self
    {
        $this->legalNotices[] = ['identifier' => $identifier, 'version' => $version];
        return $this;
    }

    /**
     * @param  string  $content
     * @param  string  $form
     * @return $this
     */
    public function proof(string $content, string $form): self
    {
        $this->proofs[] = ['content' => $content, 'form' => $form];
        return $this;
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
        return $this->withBody("preferences.$key", $value);
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
        return $this->withBody('ip_address', $value);
    }

    protected function getBody(): array
    {
        return array_merge(parent::getBody(), [
            'legal_notices' => $this->legalNotices,
            'proofs' => $this->proofs,
        ]);
    }

    /**
     * @return ConsentStoreResponse
     * @throws GuzzleException
     * @throws Exception
     */
    public function execute(): ConsentStoreResponse
    {
        return ConsentStoreResponse::create(json_decode($this->executePost()->getBody(), true));
    }
}
