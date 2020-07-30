<?php

namespace SoluzioneSoftware\Iubenda\Requests\Consent;

abstract class AbstractRequest extends \SoluzioneSoftware\Iubenda\Requests\AbstractRequest
{
    protected function getUrl(string $path = '/')
    {
        return parent::getUrl('/consent' . $path);
    }
}
