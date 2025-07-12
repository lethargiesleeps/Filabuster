<?php

namespace Database\Seeders;

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
        $types = [
            ['code' => 'I', 'name' => 'Incumbent'],
            ['code' => 'C', 'name' => 'Challenger'],
            ['code' => 'O', 'name' => 'Open'],
        ];

        SeedHelper::seedLookupTable($types, TableData::INCUMBENT_CHALLENGE_TYPES);
    }
}
