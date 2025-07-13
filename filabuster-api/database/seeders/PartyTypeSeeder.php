<?php

namespace Database\Seeders;

use App\Constants\StaticFECData;
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
        SeedHelper::seedLookupTable(StaticFECData::getStaticData(TableData::PARTIES), TableData::PARTIES);
    }
}
