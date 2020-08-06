<?php

namespace SoluzioneSoftware\Iubenda\Requests\Subjects;

abstract class AbstractRequest extends \SoluzioneSoftware\Iubenda\Requests\AbstractRequest
{
    protected function getUrl(string $path = '/'): string
    {
        return parent::getUrl('/subjects' . $path);
    }
}
