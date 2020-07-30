<?php

namespace SoluzioneSoftware\Iubenda\Facades;

use Illuminate\Support\Facades\Facade;
use SoluzioneSoftware\Iubenda\Manager;
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

/**
 * @method static ConsentIndexRequest indexConsent()
 * @method static ConsentShowRequest showConsent(string $id)
 * @method static ConsentStoreRequest storeConsent()
 * @method static LegalNoticesIndexRequest indexLegalNotices()
 * @method static LegalNoticesShowRequest showLegalNotice(string $id)
 * @method static LegalNoticesStoreRequest storeLegalNotice()
 * @method static SubjectsIndexRequest indexSubjects()
 * @method static SubjectsShowRequest showSubject(string $id)
 * @method static SubjectsStoreRequest storeSubject()
 * @method static SubjectsUpdateRequest updateSubject(string $id)
 *
 * @see \SoluzioneSoftware\Iubenda\Manager
 */
class Iubenda extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Manager::class;
    }
}
