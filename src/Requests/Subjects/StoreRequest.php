<?php

namespace SoluzioneSoftware\Iubenda\Requests\Subjects;

use Exception;
use SoluzioneSoftware\Iubenda\Responses\SubjectsStoreResponse;

class StoreRequest extends AbstractRequest
{
    /**
     * auto-filled if not provided
     *
     * @param  string  $value
     * @return $this
     */
    public function id(string $value): self
    {
        return $this->withBody('id', $value);
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

    /**
     * @param  array  $attrs
     * @return SubjectsStoreResponse
     * @throws Exception
     */
    public function execute(array $attrs): SubjectsStoreResponse
    {
        throw new Exception('Not implemented');
    }
}
