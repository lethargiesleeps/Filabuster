<?php

namespace Database\Seeders;

use App\Constants\TableData;
use App\Helpers\SeedHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //TODO: Preferably localize, rf db if needed
        $types = [
            ['code' => 'A', 'name' => 'Authorized by a candidate'],
            ['code' => 'J', 'name' => 'Joint fundraising committee'],
            ['code' => 'P', 'name' => 'Principal campaign committee of a candidate'],
            ['code' => 'U', 'name' => 'Unauthorized'],
            ['code' => 'B', 'name' => 'Lobbyist/Registrant PAC'],
            ['code' => 'D', 'name' => 'Leadership PAC'],
        ];

        SeedHelper::seedLookupTable($types, TableData::DESIGNATION_TYPES);
    }
}
