<?php

namespace SoluzioneSoftware\Iubenda\Requests\LegalNotices;

abstract class AbstractRequest extends \SoluzioneSoftware\Iubenda\Requests\AbstractRequest
{
    protected function getUrl(string $path = '/'): string
    {
        return parent::getUrl('/legal_notices' . $path);
    }
}
