<?php

namespace SoluzioneSoftware\Iubenda\Objects;

use Carbon\Carbon;
use Exception;

class Consent
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var Carbon
     */
    private $timestamp;

    /**
     * @var string
     */
    private $owner;

    /**
     * @var string
     */
    private $source;

    /**
     * @var Subject
     */
    private $subject;

    /**
     * @var array
     */
    private $preferences;

    public function __construct(string $id, Carbon $timestamp, string $owner, string $source, Subject $subject, array $preferences)
    {
        $this->id = $id;
        $this->timestamp = $timestamp;
        $this->owner = $owner;
        $this->source = $source;
        $this->subject = $subject;
        $this->preferences = $preferences;
    }

    /**
     * @param  array  $attrs
     * @return $this
     * @throws Exception
     */
    public static function create(array $attrs): self
    {
        return new self($attrs['id'], new Carbon($attrs['timestamp']), $attrs['owner'], $attrs['source'], Subject::create($attrs['subject']), $attrs['preferences']);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return Carbon
     */
    public function getTimestamp(): Carbon
    {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getOwner(): string
    {
        return $this->owner;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @return Subject
     */
    public function getSubject(): Subject
    {
        return $this->subject;
    }
}
