<?php

namespace SoluzioneSoftware\Iubenda\Responses;

use Carbon\Carbon;
use Exception;

class ConsentStoreResponse
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
    private $subjectId;

    public function __construct(string $id, Carbon $timestamp, string $subjectId)
    {
        $this->id = $id;
        $this->timestamp = $timestamp;
        $this->subjectId = $subjectId;
    }

    /**
     * @param  array  $attrs
     * @return static
     * @throws Exception
     */
    public static function create(array $attrs): self
    {
        return new self($attrs['id'], new Carbon($attrs['timestamp']), $attrs['subject_id']);
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
    public function getSubjectId(): string
    {
        return $this->subjectId;
    }
}
