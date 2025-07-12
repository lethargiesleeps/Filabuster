<?php

namespace Database\Seeders;

use App\Constants\TableData;
use App\Helpers\SeedHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateStatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['code' => 'C', 'name' => 'Present Candidate'],
            ['code' => 'F', 'name' => 'Future Candidate'],
            ['code' => 'N', 'name' => 'Not Yet a Candidate'],
            ['code' => 'P', 'name' => 'Prior Candidate'],
        ];

        SeedHelper::seedLookupTable($types, TableData::CANDIDATE_STATUS_TYPES);
    }
}
