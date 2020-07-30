<?php

namespace SoluzioneSoftware\Iubenda;

use GuzzleHttp\Client;
use SoluzioneSoftware\Iubenda\Requests\Consent\IndexRequest as ConsentIndexRequest;
use SoluzioneSoftware\Iubenda\Requests\Consent\ShowRequest as ConsentShowRequest;
use SoluzioneSoftware\Iubenda\Requests\Consent\StoreRequest as ConsentStoreRequest;
use SoluzioneSoftware\Iubenda\Requests\LegalNotices\IndexRequest as LegalNoticesIndexRequest;
use SoluzioneSoftware\Iubenda\Requests\LegalNotices\ShowRequest as LegalNoticesShowRequest;
use SoluzioneSoftware\Iubenda\Requests\LegalNotices\StoreRequest as LegalNoticesStoreRequest;
use SoluzioneSoftware\Iubenda\Requests\Subjects\IndexRequest as SubjectsIndexRequest;
use SoluzioneSoftware\Iubenda\Requests\Subjects\ShowRequest as SubjectsShowRequest;
use SoluzioneSoftware\Iubenda\Requests\Subjects\StoreRequest as SubjectsStoreRequest;
use SoluzioneSoftware\Iubenda\Requests\Subjects\UpdateRequest as SubjectsUpdateRequest;

class Manager
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function indexConsent(): ConsentIndexRequest
    {
        return new ConsentIndexRequest($this->client);
    }

    public function showConsent(string $id): ConsentShowRequest
    {
        return new ConsentShowRequest($this->client, $id);
    }

    public function storeConsent(): ConsentStoreRequest
    {
        return new ConsentStoreRequest($this->client);
    }

    public function indexLegalNotices(): LegalNoticesIndexRequest
    {
        return new LegalNoticesIndexRequest($this->client);
    }

    public function showLegalNotice(string $id): LegalNoticesShowRequest
    {
        return new LegalNoticesShowRequest($this->client, $id);
    }

    public function storeLegalNotice(): LegalNoticesStoreRequest
    {
        return new LegalNoticesStoreRequest($this->client);
    }

    public function indexSubjects(): SubjectsIndexRequest
    {
        return new SubjectsIndexRequest($this->client);
    }

    public function showSubject(string $id): SubjectsShowRequest
    {
        return new SubjectsShowRequest($this->client, $id);
    }

    public function storeSubject(): SubjectsStoreRequest
    {
        return new SubjectsStoreRequest($this->client);
    }

    public function updateSubject(string $id): SubjectsUpdateRequest
    {
        return new SubjectsUpdateRequest($this->client, $id);
    }
}
