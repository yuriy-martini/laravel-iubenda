<?php

namespace SoluzioneSoftware\Iubenda\Requests\LegalNotices;

use Carbon\Carbon;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use SoluzioneSoftware\Iubenda\Responses\LegalNoticeStoreResponse;

class StoreRequest extends AbstractRequest
{

    /**
     * ISO 8601 timestamp of the Legal Notice<br>
     * auto-filled if not provided
     *
     * @param  Carbon  $value
     * @return StoreRequest
     */
    public function timestamp(Carbon $value): self
    {
        return $this->withBody('timestamp', $value->toIso8601ZuluString());
    }

    /**
     * Saves the passed identifier on the Legal Notice.
     * Default null
     *
     * @param string $value
     * @return StoreRequest
     */
    public function identifier(string $value): self
    {
        return $this->withBody('identifier', $value);
    }

    /**
     * Saves the passed content(s) on the Legal Notice.
     * Default null
     *
     * @param string|array $value
     * @return StoreRequest
     */
    public function content($value): self
    {
        return $this->withBody('content', $value);
    }

    /**
     * @return LegalNoticeStoreResponse
     * @throws GuzzleException
     * @throws Exception
     */
    public function execute(): LegalNoticeStoreResponse
    {
        return LegalNoticeStoreResponse::create(json_decode($this->executePost()->getBody(), true));
    }
}
