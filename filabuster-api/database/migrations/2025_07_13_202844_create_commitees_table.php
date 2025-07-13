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
        Schema::create(TableData::COMMITTEES[Keys::NAME], function (Blueprint $table) {
            // Primary identification
            $table->uuid(Keys::ID)->primary();
            $table->string(Keys::COMMITTEE_ID)->index();
            $table->string(Keys::NAME);
            $table->string(Keys::AFFILIATED_COMMITTEE_NAME)->nullable();

            $table->enum(Keys::COMMITTEE_TYPE, Common::getArrayValues(StaticFECData::getStaticData(TableData::COMMITTEE_TYPES), Keys::CODE));
            $table->enum(Keys::DESIGNATION, Common::getArrayValues(StaticFECData::getStaticData(TableData::DESIGNATION_TYPES), Keys::CODE));
            $table->enum(Keys::FILING_FREQUENCY, Common::getArrayValues(StaticFECData::getStaticData(TableData::FILING_FREQUENCY_TYPES), Keys::CODE));
            $table->enum(Keys::ORGANIZATION_TYPE, Common::getArrayValues(StaticFECData::getStaticData(TableData::ORGANIZATION_TYPES), Keys::CODE));
            $table->string(Keys::PARTY, 7);

            $table->string(Keys::ADDRESS_STREET_1)->nullable();
            $table->string(Keys::ADDRESS_STREET_2)->nullable();
            $table->string(Keys::ADDRESS_CITY)->nullable();
            $table->string(Keys::ADDRESS_STATE, 2);
            $table->string(Keys::ADDRESS_ZIP, 10);

            $table->string(Keys::EMAIL)->nullable();
            $table->string(Keys::WEBSITE)->nullable();
            $table->string(Keys::FAX)->nullable();

            $table->string(Keys::TREASURER_NAME)->nullable();
            $table->string(Keys::TREASURER_NAME_1)->nullable();
            $table->string(Keys::TREASURER_NAME_2)->nullable();
            $table->string(Keys::TREASURER_NAME_MIDDLE)->nullable();
            $table->string(Keys::TREASURER_NAME_PREFIX)->nullable();
            $table->string(Keys::TREASURER_NAME_SUFFIX)->nullable();
            $table->string(Keys::TREASURER_NAME_TITLE)->nullable();
            $table->string(Keys::TREASURER_PHONE)->nullable();
            $table->string(Keys::TREASURER_STREET_1)->nullable();
            $table->string(Keys::TREASURER_STREET_2)->nullable();
            $table->string(Keys::TREASURER_CITY)->nullable();
            $table->string(Keys::TREASURER_STATE, 2)->nullable();
            $table->string(Keys::TREASURER_ZIP, 10)->nullable();

            $table->string(Keys::CUSTODIAN_NAME_FULL)->nullable();
            $table->string(Keys::CUSTODIAN_NAME_1)->nullable();
            $table->string(Keys::CUSTODIAN_NAME_2)->nullable();
            $table->string(Keys::CUSTODIAN_NAME_MIDDLE)->nullable();
            $table->string(Keys::CUSTODIAN_NAME_PREFIX)->nullable();
            $table->string(Keys::CUSTODIAN_NAME_SUFFIX)->nullable();
            $table->string(Keys::CUSTODIAN_NAME_TITLE)->nullable();
            $table->string(Keys::CUSTODIAN_PHONE)->nullable();
            $table->string(Keys::CUSTODIAN_STREET_1)->nullable();
            $table->string(Keys::CUSTODIAN_STREET_2)->nullable();
            $table->string(Keys::CUSTODIAN_CITY)->nullable();
            $table->string(Keys::CUSTODIAN_STATE, 2)->nullable();
            $table->string(Keys::CUSTODIAN_ZIP, 10)->nullable();

            $table->date(Keys::FIRST_FILE_DATE)->nullable();
            $table->date(Keys::LAST_FILE_DATE)->nullable();
            $table->date(Keys::FIRST_F1_DATE)->nullable();
            $table->date(Keys::LAST_F1_DATE)->nullable();

            // Special flags
            $table->string(Keys::LEADERSHIP_PAC)->nullable();
            $table->string(Keys::LOBBYIST_REGISTRANT_PAC, 1)->nullable();
            $table->string(Keys::FORM_TYPE, 3)->nullable();

            // JSON arrays
            $table->json(Keys::CYCLES)->nullable();
            $table->json(Keys::SPONSOR_CANDIDATE_IDS)->nullable();
            $table->json(Keys::JFC_COMMITTEE)->nullable(); // Joint Fundraising Committees

            $table->timestamps();

            $table->foreign(Keys::COMMITTEE_TYPE)->references(Keys::CODE)->on(TableData::COMMITTEE_TYPES[Keys::NAME]);
            $table->foreign(Keys::DESIGNATION)->references(Keys::CODE)->on(TableData::DESIGNATION_TYPES[Keys::NAME]);
            $table->foreign(Keys::FILING_FREQUENCY)->references(Keys::CODE)->on(TableData::FILING_FREQUENCY_TYPES[Keys::NAME]);
            $table->foreign(Keys::ORGANIZATION_TYPE)->references(Keys::CODE)->on(TableData::ORGANIZATION_TYPES[Keys::NAME]);
            $table->foreign(Keys::PARTY)->references(Keys::CODE)->on(TableData::PARTIES[Keys::NAME]);
        });

        Schema::create(TableData::CANDIDATE_COMMITTEE[Keys::NAME], function (Blueprint $table) {
            $table->string(Keys::CANDIDATE_ID);
            $table->string(Keys::COMMITTEE_ID);
            $table->string(Keys::RELATIONSHIP_TYPE)->nullable(); // e.g., 'sponsor', 'affiliated'
            $table->primary([Keys::CANDIDATE_ID, Keys::COMMITTEE_ID]);

            $table->foreign(Keys::CANDIDATE_ID)->references(Keys::CANDIDATE_ID)->on(TableData::CANDIDATES[Keys::NAME])->onDelete('cascade');
            $table->foreign(Keys::COMMITTEE_ID)->references(Keys::COMMITTEE_ID)->on(TableData::COMMITTEES[Keys::NAME])->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableData::CANDIDATE_COMMITTEE[Keys::NAME]);
        Schema::dropIfExists(TableData::COMMITTEES[Keys::NAME]);
    }
};
