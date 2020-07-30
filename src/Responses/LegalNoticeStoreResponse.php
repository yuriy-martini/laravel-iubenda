<?php

namespace SoluzioneSoftware\Iubenda\Responses;

use Carbon\Carbon;
use Exception;

class LegalNoticeStoreResponse
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * @var Carbon
     */
    private $timestamp;

    /**
     * @var int
     */
    private $version;

    public function __construct(string $identifier, Carbon $timestamp, int $version)
    {
        $this->identifier = $identifier;
        $this->timestamp = $timestamp;
        $this->version = $version;
    }

    /**
     * @param  array  $attrs
     * @return static
     * @throws Exception
     */
    public static function create(array $attrs): self
    {
        return new self($attrs['identifier'], new Carbon($attrs['timestamp']), (int)$attrs['version']);
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @return Carbon
     */
    public function getTimestamp(): Carbon
    {
        return $this->timestamp;
    }

    /**
     * @return int
     */
    public function getVersion(): int
    {
        return $this->version;
    }
}
