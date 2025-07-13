<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        $this->call([
            CommitteeTypeSeeder::class,
            DesignationTypeSeeder::class,
            OfficeTypeSeeder::class,
            PartyTypeSeeder::class,
            StateSeeder::class,
            CandidateStatusTypeSeeder::class,
            IncumbentChallengeTypeSeeder::class,
            FilingFrequencyTypeSeeder::class,
            OrganizationTypeSeeder::class,
            ReportTypeSeeder::class,
            AmendmentTypeSeeder::class,
            EntityTypeSeeder::class,
            RequestTypeSeeder::class,
            DocumentTypeSeeder::class,
            FormTypeSeeder::class
        ]);
    }
}
