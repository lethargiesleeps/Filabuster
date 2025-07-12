<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DesignationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //TODO: Preferably localize, rf db if needed
        $designationTypes = [
            ['code' => 'A', 'name' => 'Authorized by a candidate'],
            ['code' => 'J', 'name' => 'Joint fundraising committee'],
            ['code' => 'P', 'name' => 'Principal campaign committee of a candidate'],
            ['code' => 'U', 'name' => 'Unauthorized'],
            ['code' => 'B', 'name' => 'Lobbyist/Registrant PAC'],
            ['code' => 'D', 'name' => 'Leadership PAC'],
        ];

        $localizationID = 0;
        foreach ($designationTypes as $type) {
            $type['id'] = Str::uuid();
            $type['localization_id'] = $localizationID;
            DB::table('designation_types')->updateOrInsert(
                ['code' => $type['code']],
                $type
            );
            $localizationID++;
        }
    }
}
