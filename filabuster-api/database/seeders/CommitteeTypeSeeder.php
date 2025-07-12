<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CommitteeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //TODO: Preferably localize, rf db if so
        $committeeTypes = [
            ['code' => 'C', 'name' => 'Communication Cost', 'description' => 'Organizations that report communication costs', 'is_pac' => false, 'is_party' => false],
            ['code' => 'D', 'name' => 'Delegate', 'description' => 'Delegate committees for presidential nominating conventions', 'is_pac' => false, 'is_party' => false],
            ['code' => 'E', 'name' => 'Electioneering', 'description' => 'Electioneering communication organizations', 'is_pac' => false, 'is_party' => false],
            ['code' => 'H', 'name' => 'House', 'description' => 'Campaign committees for House candidates', 'is_pac' => false, 'is_party' => false],
            ['code' => 'I', 'name' => 'IE-Only', 'description' => 'Independent expenditure filers (not committees)', 'is_pac' => false, 'is_party' => false],
            ['code' => 'N', 'name' => 'Non-Qualified PAC', 'description' => 'PACs that have not met contribution/expenditure thresholds', 'is_pac' => true, 'is_party' => false],
            ['code' => 'O', 'name' => 'Super PAC', 'description' => 'Independent expenditure-only (super PACs)', 'is_pac' => true, 'is_party' => false],
            ['code' => 'P', 'name' => 'Presidential', 'description' => 'Campaign committees for presidential candidates', 'is_pac' => false, 'is_party' => false],
            ['code' => 'Q', 'name' => 'Qualified PAC', 'description' => 'PACs that meet contribution/expenditure thresholds', 'is_pac' => true, 'is_party' => false],
            ['code' => 'S', 'name' => 'Senate', 'description' => 'Campaign committees for Senate candidates', 'is_pac' => false, 'is_party' => false],
            ['code' => 'U', 'name' => 'Single-Candidate IE', 'description' => 'Single candidate independent expenditure committees', 'is_pac' => false, 'is_party' => false],
            ['code' => 'V', 'name' => 'Hybrid PAC (Non-Qualified)', 'description' => 'PACs with non-contribution accounts (non-qualified)', 'is_pac' => true, 'is_party' => false],
            ['code' => 'W', 'name' => 'Hybrid PAC (Qualified)', 'description' => 'PACs with non-contribution accounts (qualified)', 'is_pac' => true, 'is_party' => false],
            ['code' => 'X', 'name' => 'Party Non-Qualified', 'description' => 'Party committees (non-qualified)', 'is_pac' => false, 'is_party' => true],
            ['code' => 'Y', 'name' => 'Party Qualified', 'description' => 'Party committees (qualified)', 'is_pac' => false, 'is_party' => true],
            ['code' => 'Z', 'name' => 'National Party Non-Federal', 'description' => 'National party non-federal accounts', 'is_pac' => false, 'is_party' => true]
        ];

        $localizationID = 0;
        foreach ($committeeTypes as $type) {
            $type['id'] = Str::uuid();
            $type['localization_id'] = $localizationID;
            DB::table('committee_types')->updateOrInsert(
                ['code' => $type['code']],
                $type
            );
            $localizationID++;
        }
    }
}
