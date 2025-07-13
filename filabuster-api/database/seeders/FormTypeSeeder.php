<?php

namespace Database\Seeders;

use App\Constants\StaticFECData;
use App\Constants\TableData;
use App\Helpers\SeedHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeedHelper::seedLookupTable(StaticFECData::getStaticData(TableData::FORM_TYPES), TableData::FORM_TYPES);
    }
}
