<?php

namespace App\Helpers;

use App\Constants\TableData;
use App\Enums\TableType;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Util methods for DB seeding
 */
class SeedHelper
{
    /**
     * Function that seeds a lookup table. Will either add entries if they don't exist or update existing ones if they change in the actual seeder.
     * @param array $types Data to add to lookup table
     * @param array $table Table data, passed from TableData.php
     * @param bool $hasLocalizationId
     * @return void
     */
    public static function seedLookupTable(array $types, array $table, bool $hasLocalizationId = true): void {

        if(empty($table['name'])) {
            throw new InvalidArgumentException('Table name cannot be empty');
        }

        if(empty($types)) {
            throw new InvalidArgumentException('Types array cannot be empty');
        }

        if($table['type'] != TableType::LOOKUP) {
            throw new InvalidArgumentException('Table must be an existing LOOKUP table');
        }

        if(!in_array($table['name'], TableData::LOOKUP_TABLE_NAMES, true)) {
            throw new InvalidArgumentException('Table does not exist, refer to Constants->TableData.php for available tables');
        }

        $localizationID = 0;

        foreach ($types as $type) {
            $type['id'] = Str::uuid();

            if ($hasLocalizationId) {
                $type['localization_id'] = $localizationID;
            }

            DB::table($table['name'])->updateOrInsert(
                ['code' => $type['code']],
                $type
            );

            $localizationID++;
        }
    }
}
