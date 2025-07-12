<?php

namespace Database\Seeders;

use App\Constants\TableData;
use App\Helpers\SeedHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PartyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //TODO: Preferably localize, rf db if so
        $types = [
            ['code' => 'DEM', 'name' => 'Democrat'],
            ['code' => 'REP', 'name' => 'Republican'],
            ['code' => 'IND', 'name' => 'Independent'],

        ];

        SeedHelper::seedLookupTable($types, TableData::PARTY_TYPES);
    }
}
