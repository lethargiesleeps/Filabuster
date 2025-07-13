<?php

use App\Constants\StaticFECData;
use App\Helpers\Common;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\TableData;
use App\Constants\Keys;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableData::CANDIDATES[Keys::NAME], function (Blueprint $table) {
            $table->uuid(Keys::ID)->primary();
            $table->string(Keys::CANDIDATE_ID)->index();
            $table->string(Keys::CANDIDATE_NAME)->unique();
            $table->string(Keys::CANDIDATE_FIRST_NAME)->nullable();
            $table->string(Keys::CANDIDATE_MIDDLE_NAME)->nullable();
            $table->string(Keys::CANDIDATE_LAST_NAME)->nullable();
            $table->string(Keys::CANDIDATE_PREFIX)->nullable();
            $table->string(Keys::CANDIDATE_SUFFIX)->nullable();

            $table->string(Keys::PARTY, 7);
            $table->enum(Keys::OFFICE, Common::getArrayValues(StaticFECData::getStaticData(TableData::OFFICE_TYPES), Keys::CODE));
            $table->enum(Keys::INCUMBENT_CHALLENGE, Common::getArrayValues(StaticFECData::getStaticData(TableData::INCUMBENT_CHALLENGE_TYPES), Keys::CODE));
            $table->enum(Keys::CANDIDATE_STATUS, Common::getArrayValues(StaticFECData::getStaticData(TableData::CANDIDATE_STATUS_TYPES), Keys::CODE));

            $table->string(Keys::ADDRESS_STREET_1)->nullable();
            $table->string(Keys::ADDRESS_STREET_2)->nullable();
            $table->string(Keys::ADDRESS_CITY)->nullable();
            $table->string(Keys::ADDRESS_STATE, 2);
            $table->string(Keys::ADDRESS_ZIP, 10)->nullable();

            $table->string(Keys::STATE, 2);
            $table->string(Keys::DISTRICT, 2)->nullable();
            $table->integer(Keys::DISTRICT_NUMBER)->nullable();

            $table->date(Keys::FIRST_FILE_DATE)->nullable();
            $table->date(Keys::LAST_FILE_DATE)->nullable();
            $table->date(Keys::LAST_F2_DATE)->nullable();
            $table->dateTime(Keys::LOAD_DATE)->nullable();

            // Boolean flags
            $table->boolean(Keys::CANDIDATE_INACTIVE)->default(false);
            $table->boolean(Keys::FEDERAL_FUNDS_FLAG)->default(false);
            $table->boolean(Keys::HAS_RAISED_FUNDS)->default(false);

            // Additional fields
            $table->string(Keys::FLAGS)->nullable();
            $table->integer(Keys::ACTIVE_THROUGH)->default(0);

            // Array fields (stored as JSON)
            $table->json(Keys::CYCLES)->nullable();
            $table->json(Keys::ELECTION_DISTRICTS)->nullable();
            $table->json(Keys::ELECTION_YEARS)->nullable();

            // Timestamps
            $table->timestamps();

            // Foreign key constraints
            $table->foreign(Keys::PARTY)->references(Keys::CODE)->on(TableData::PARTIES[Keys::NAME]);
            $table->foreign(Keys::OFFICE)->references(Keys::CODE)->on(TableData::OFFICE_TYPES[Keys::NAME]);
            $table->foreign(Keys::INCUMBENT_CHALLENGE)->references(Keys::CODE)->on(TableData::INCUMBENT_CHALLENGE_TYPES[Keys::NAME]);
            $table->foreign(Keys::CANDIDATE_STATUS)->references(Keys::CODE)->on(TableData::CANDIDATE_STATUS_TYPES[Keys::NAME]);
            $table->foreign(Keys::STATE)->references(Keys::CODE)->on(TableData::US_STATES[Keys::NAME]);
            $table->foreign(Keys::ADDRESS_STATE)->references(Keys::CODE)->on(TableData::US_STATES[Keys::NAME]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableData::CANDIDATES[Keys::NAME]);
    }
};
