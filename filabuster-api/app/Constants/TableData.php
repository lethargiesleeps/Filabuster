<?php

namespace App\Constants;

use App\Enums\TableType;
use App\Constants\Keys;

class TableData
{
    public const COMMITTEE_TYPES = [ Keys::NAME => 'committee_types', Keys::TYPE => TableType::LOOKUP ];
    public const DESIGNATION_TYPES = [ Keys::NAME => 'designation_types', Keys::TYPE => TableType::LOOKUP ];
    public const OFFICE_TYPES = [ Keys::NAME => 'office_types', Keys::TYPE => TableType::LOOKUP ];
    public const PARTIES = [ Keys::NAME => 'parties', Keys::TYPE => TableType::LOOKUP ];
    public const CANDIDATE_STATUS_TYPES = [ Keys::NAME => 'candidate_status_types', Keys::TYPE => TableType::LOOKUP ];
    public const INCUMBENT_CHALLENGE_TYPES = [ Keys::NAME => 'incumbent_challenge_types', Keys::TYPE => TableType::LOOKUP ];
    public const FILING_FREQUENCY_TYPES = [ Keys::NAME => 'filing_frequency_types', Keys::TYPE => TableType::LOOKUP ];
    public const US_STATES = [ Keys::NAME => 'states_us', Keys::TYPE => TableType::LOOKUP ];
    public const ORGANIZATION_TYPES = [ Keys::NAME => 'organization_types', Keys::TYPE => TableType::LOOKUP ];
    public const REPORT_TYPES = [ Keys::NAME => 'report_types', Keys::TYPE => TableType::LOOKUP ];
    public const AMENDMENT_TYPES = [ Keys::NAME => 'amendment_types', Keys::TYPE => TableType::LOOKUP ];
    public const ENTITY_TYPES = [ Keys::NAME => 'entity_types', Keys::TYPE => TableType::LOOKUP ];
    public const REQUEST_TYPES = [ Keys::NAME => 'request_types', Keys::TYPE => TableType::LOOKUP ];
    public const DOCUMENT_TYPES = [ Keys::NAME => 'document_types', Keys::TYPE => TableType::LOOKUP ];
    public const FORM_TYPES = [ KEYS::NAME => 'form_types', Keys::TYPE => TableType::LOOKUP ];

    public const CANDIDATES = [ Keys::NAME => 'candidates', Keys::TYPE => TableType::ENTITY ];
    public const COMMITTEES = [ Keys::NAME => 'committees', Keys::TYPE => TableType::ENTITY ];
    public const CANDIDATE_COMMITTEE = [ Keys::NAME => 'candidate_committee', Keys::TYPE => TableType::PIVOT ];
    public const LOOKUP_TABLE_NAMES = [
        self::COMMITTEE_TYPES[Keys::NAME],
        self::DESIGNATION_TYPES[Keys::NAME],
        self::OFFICE_TYPES[Keys::NAME],
        self::PARTIES[Keys::NAME],
        self::CANDIDATE_STATUS_TYPES[Keys::NAME],
        self::INCUMBENT_CHALLENGE_TYPES[Keys::NAME],
        self::US_STATES[Keys::NAME],
        self::FILING_FREQUENCY_TYPES[Keys::NAME],
        self::ORGANIZATION_TYPES[Keys::NAME],
        self::REPORT_TYPES[Keys::NAME],
        self::AMENDMENT_TYPES[Keys::NAME],
        self::ENTITY_TYPES[Keys::NAME],
        self::REQUEST_TYPES[Keys::NAME],
        self::DOCUMENT_TYPES[Keys::NAME],
        self::FORM_TYPES[Keys::NAME],
    ];
}
