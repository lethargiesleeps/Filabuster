<?php

namespace Database\Seeders;

use App\Constants\TableData;
use App\Helpers\SeedHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class OfficeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types= [
            ['code' => 'H', 'name' => 'House of Representatives'],
            ['code' => 'S', 'name' => 'Senate'],
            ['code' => 'P', 'name' => 'Presidential'],
        ];

        SeedHelper::seedLookupTable($types, TableData::OFFICE_TYPES);
    }
}
