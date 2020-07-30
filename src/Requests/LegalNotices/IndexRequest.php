<?php

namespace SoluzioneSoftware\Iubenda\Requests\LegalNotices;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use SoluzioneSoftware\Iubenda\Objects\LegalNotice;

class IndexRequest extends AbstractRequest
{
    /**
     * Filter by consents timestamp. Returns all consents from that time onward (inclusive).<br>
     * Valid formats: 2018-02-22 00:40:00 UTC, 2018-02-22T00:40:00Z (ISO 8601), 1519260000 (unix timestamp in seconds).<br>
     * Default null
     *
     * @param  Carbon  $time
     * @return $this
     */
    public function fromTime(Carbon $time): self
    {
        return $this->withQuery('from_time', $time->toIso8601ZuluString());
    }

    /**
     * Filter by consents timestamp. Returns all consents from that time backward (inclusive).<br>
     * Valid formats: 2018-02-22 00:40:00 UTC, 2018-02-22T00:40:00Z (ISO 8601), 1519260000 (unix timestamp in seconds).<br>
     * Default null
     *
     * @param  Carbon  $time
     * @return $this
     */
    public function toTime(Carbon $time): self
    {
        return $this->withQuery('to_time', $time->toIso8601ZuluString());
    }

    /**
     * Filter by consents source.<br>
     * Possible values: public, private.<br>
     * Default null
     *
     * @param  string  $value
     * @return $this
     */
    public function source(string $value): self
    {
        return $this->withQuery('source', $value);
    }

    /**
     * Filter by IP address.<br>
     * Valid formats (IP address format).<br>
     * Default null
     *
     * @param  string  $value
     * @return $this
     */
    public function ipAddress(string $value): self
    {
        return $this->withQuery('ip_address', $value);
    }

    /**
     * Filter by consents type. By not passing this value it returns all consents.<br>
     * Possible values: cookie_policy, null.<br>
     * Default null
     *
     * @param  string  $value
     * @return $this
     */
    public function consentType(string $value): self
    {
        return $this->withQuery('consent_type', $value);
    }

    /**
     * Filter by Subject ID.<br>
     * Default null
     *
     * @param  string  $value
     * @return $this
     */
    public function subjectId(string $value): self
    {
        return $this->withQuery('subject_id', $value);
    }

    /**
     * Filter by Subject email. It must exactly match (case sensitive).<br>
     * Default null
     *
     * @param  string  $value
     * @return $this
     */
    public function subjectEmailExact(string $value): self
    {
        return $this->withQuery('subject_email_exact', $value);
    }

    /**
     * Filter by Subject email. It tries to match parts of the provided email split by dots and spaces.<br>
     * Ex. providing “@test.com” will match all the subjects with an email containing “@test” or containing “com” (case insensitive).<br>
     * Default null
     *
     * @param  string  $value
     * @return $this
     */
    public function subjectEmail(string $value): self
    {
        return $this->withQuery('subject_email', $value);
    }

    /**
     * Filter by Subject first name. It must exactly match (case sensitive).<br>
     * Default null
     *
     * @param  string  $value
     * @return $this
     */
    public function subjectFirstName(string $value): self
    {
        return $this->withQuery('subject_first_name', $value);
    }

    /**
     * Filter by Subject last name. It must exactly match (case sensitive).<br>
     * Default null
     *
     * @param  string  $value
     * @return $this
     */
    public function subjectLastName(string $value): self
    {
        return $this->withQuery('subject_last_name', $value);
    }

    /**
     * Filter by Subject full name. It tries to match parts of the provided full name split by dots and spaces.<br>
     * Ex. “test hello” will match all the subjects with a full name containing “test” or containing “hello” (case insensitive).<br>
     * Default null
     *
     * @param  string  $value
     * @return $this
     */
    public function subjectFullName(string $value): self
    {
        return $this->withQuery('subject_full_name', $value);
    }

    /**
     * Filter by subject verified status.<br>
     * Possible values: true, false.<br>
     * Default null
     *
     * @param  bool  $value
     * @return $this
     */
    public function subjectVerified(bool $value): self
    {
        return $this->withQuery('subject_verified', $value);
    }

    /**
     * Filter for consents in which the key exists.<br>
     * Default null
     *
     * @param  string  $value
     * @return $this
     */
    public function preferenceKey(string $value): self
    {
        return $this->withQuery('preference_key', $value);
    }

    /**
     * Filters for results with the value provided being contained in either subject’s id, first_name, last_name, full_name, email.<br>
     * Default null
     *
     * @param  string  $value
     * @return $this
     */
    public function fulltext(string $value): self
    {
        return $this->withQuery('fulltext', $value);
    }

    /**
     * Cursor which indicates after which Consent the results should be returned (cursor excluded).<br>
     * Default null
     *
     * @param  string  $value
     * @return $this
     */
    public function startingAfter(string $value): self
    {
        return $this->withQuery('starting_after', $value);
    }

    /**
     * Number indicating the number of results returned.<br>
     * Min: 1, Max: 100.<br>
     * Default 10
     *
     * @param  string  $value
     * @return $this
     */
    public function limit(string $value): self
    {
        return $this->withQuery('limit', $value);
    }

    /**
     * @return Collection
     * @throws GuzzleException
     */
    public function execute(): Collection
    {
        $response = $this->get($this->getUrl());
        $items = json_decode($response->getBody());

        return (new Collection($items))
            ->map(function (array $item){
                return LegalNotice::create($item);
            });
    }
}
