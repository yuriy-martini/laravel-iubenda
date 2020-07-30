<?php

namespace SoluzioneSoftware\Iubenda\Responses;

use Carbon\Carbon;
use Exception;

class SubjectsUpdateResponse extends AbstractSubjectsResponse
{
    /**
     * @param  array  $attrs
     * @return $this
     * @throws Exception
     */
    public static function create(array $attrs)
    {
        return new self($attrs['id'], new Carbon($attrs['timestamp']));
    }
}
