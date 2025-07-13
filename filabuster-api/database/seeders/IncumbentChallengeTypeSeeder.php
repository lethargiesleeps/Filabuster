<?php

namespace Database\Seeders;

use App\Constants\StaticFECData;
use App\Constants\TableData;
use App\Helpers\SeedHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncumbentChallengeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeedHelper::seedLookupTable(StaticFECData::getStaticData(TableData::INCUMBENT_CHALLENGE_TYPES), TableData::INCUMBENT_CHALLENGE_TYPES);
    }
}
