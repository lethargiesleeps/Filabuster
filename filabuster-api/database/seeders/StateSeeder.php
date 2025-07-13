<?php

namespace Database\Seeders;

use App\Constants\StaticFECData;
use App\Constants\TableData;
use App\Helpers\SeedHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeedHelper::seedLookupTable(StaticFECData::getStaticData(TableData::US_STATES), TableData::US_STATES);
    }
}
