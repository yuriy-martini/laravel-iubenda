<?php

namespace SoluzioneSoftware\Iubenda\Responses;

use Carbon\Carbon;

abstract class AbstractSubjectsResponse
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var Carbon
     */
    protected $createdAt;

    public function __construct(string $id, Carbon $createdAt)
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
    }

    /**
     * @param  array  $attrs
     * @return $this
     */
    abstract public static function create(array $attrs);

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
    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }
}
