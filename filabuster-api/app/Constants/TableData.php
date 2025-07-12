<?php

namespace App\Constants;

use App\Enums\TableType;

class TableData
{
    public const COMMITTEE_TYPES = [ 'name' => 'committee_types', 'type' => TableType::LOOKUP ];
    public const DESIGNATION_TYPES = [ 'name' => 'designation_types', 'type' => TableType::LOOKUP ];
    public const OFFICE_TYPES = [ 'name' => 'office_types', 'type' => TableType::LOOKUP ];
    public const PARTY_TYPES = [ 'name' => 'party_types', 'type' => TableType::LOOKUP ];
    public const CANDIDATE_STATUS_TYPES = [ 'name' => 'candidate_status_types', 'type' => TableType::LOOKUP ];
    public const INCUMBENT_CHALLENGE_TYPES = [ 'name' => 'incumbent_challenge_types', 'type' => TableType::LOOKUP ];
    public const AVAILABLE_YEARS = [ 'name' => 'available_years', 'type' => TableType::LOOKUP ];
    public const US_STATES = [ 'name' => 'states_us', 'type' => TableType::LOOKUP ];

    public const LOOKUP_TABLE_NAMES = [self::COMMITTEE_TYPES['name'],
      self::DESIGNATION_TYPES['name'],
      self::OFFICE_TYPES['name'],
      self::PARTY_TYPES['name'],
      self::CANDIDATE_STATUS_TYPES['name'],
      self::INCUMBENT_CHALLENGE_TYPES['name'],
      self::US_STATES['name'],
        self::AVAILABLE_YEARS['name']

    ];
}
