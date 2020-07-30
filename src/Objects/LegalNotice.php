<?php

namespace SoluzioneSoftware\Iubenda\Objects;

use Carbon\Carbon;
use Exception;

class LegalNotice
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $ownerId;

    /**
     * @var string
     */
    private $identifier;

    /**
     * @var int
     */
    private $version;

    /**
     * @var Carbon
     */
    private $timestamp;

    /**
     * @var array|string
     */
    private $content;

    /**
     * LegalNotice constructor.
     * @param  string  $id
     * @param  string  $ownerId
     * @param  string  $identifier
     * @param  int  $version
     * @param  Carbon  $timestamp
     * @param string|array $content
     */
    public function __construct(string $id, string $ownerId, string $identifier, int $version, Carbon $timestamp, $content)
    {
        $this->id = $id;
        $this->ownerId = $ownerId;
        $this->identifier = $identifier;
        $this->version = $version;
        $this->timestamp = $timestamp;
        $this->content = $content;
    }

    /**
     * @param  array  $attrs
     * @return static
     * @throws Exception
     */
    public static function create(array $attrs): self
    {
        return new self($attrs['id'], $attrs['owner_id'], $attrs['identifier'], (int)$attrs['version'], new Carbon($attrs['timestamp']), $attrs['content']);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getOwnerId(): string
    {
        return $this->ownerId;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @return int
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @return Carbon
     */
    public function getTimestamp(): Carbon
    {
        return $this->timestamp;
    }

    /**
     * @return array|string
     */
    public function getContent()
    {
        return $this->content;
    }

}
