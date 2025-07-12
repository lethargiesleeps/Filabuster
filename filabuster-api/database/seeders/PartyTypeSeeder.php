<?php

namespace Database\Seeders;

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
        $partyTypes = [
            ['code' => 'DEM', 'name' => 'Democrat'],
            ['code' => 'REP', 'name' => 'Republican'],
            ['code' => 'IND', 'name' => 'Independent'],

        ];

        foreach ($partyTypes as $type) {
            $type['id'] = Str::uuid();
            DB::table('party_types')->updateOrInsert(
                ['code' => $type['code']],
                $type
            );
        }
    }
}
