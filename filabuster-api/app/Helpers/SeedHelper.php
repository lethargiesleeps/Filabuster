<?php

namespace App\Helpers;

use App\Constants\TableData;
use App\Constants\Keys;
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
     * @param array $tableData Data to add to lookup table
     * @param array $table Table data, passed from TableData.php
     * @param bool $hasLocalizationId
     * @return void
     */
    public static function seedLookupTable(array $tableData, array $table, bool $hasLocalizationId = true): void {

        if(empty($table[Keys::NAME])) {
            throw new InvalidArgumentException('Table name cannot be empty');
        }

        if(empty($tableData)) {
            throw new InvalidArgumentException('Types array cannot be empty');
        }

        if($table['type'] != TableType::LOOKUP) {
            throw new InvalidArgumentException('Table must be an existing LOOKUP table');
        }

        if(!in_array($table[Keys::NAME], TableData::LOOKUP_TABLE_NAMES, true)) {
            throw new InvalidArgumentException('Table does not exist, refer to Constants->TableData.php for available tables');
        }

        $localizationID = 0;

        foreach ($tableData as $type) {
            if(!isset($type[Keys::CODE])) {
                throw new InvalidArgumentException('Lookup table most have property "code"');
            }
            elseif (!isset($type[Keys::NAME])) {
                throw new InvalidArgumentException('Lookup table most have property "name"');
            }
            $data = [
                Keys::ID => Str::uuid(),
                Keys::CODE => $type[Keys::CODE],
                Keys::NAME => $type[Keys::NAME]
            ];

            if ($hasLocalizationId) {
                $data['localization_id'] = $localizationID;
            }

            $data = array_merge($data, $type);
            DB::table($table[Keys::NAME])->updateOrInsert(
                [Keys::CODE => $type[Keys::CODE]],
                $data
            );

            $localizationID++;
        }
    }
}
