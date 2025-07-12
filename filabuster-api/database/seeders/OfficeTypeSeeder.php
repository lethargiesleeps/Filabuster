<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OfficeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $officeTypes = [
            ['code' => 'H', 'name' => 'House of Representatives'],
            ['code' => 'S', 'name' => 'Senate'],
            ['code' => 'P', 'name' => 'Presidential'],
        ];

        $localizationID = 0;
        foreach ($officeTypes as $type) {
            $type['id'] = Str::uuid();
            $type['localization_id'] = $localizationID;
            DB::table('office_types')->updateOrInsert(
                ['code' => $type['code']],
                $type
            );
            $localizationID++;
        }
    }
}
