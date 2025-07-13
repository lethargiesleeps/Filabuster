<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\TableData;
use App\Constants\Keys;
use App\Constants\StaticFECData;
use App\Helpers\Common;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(TableData::COMMITTEE_TYPES[Keys::NAME], function (Blueprint $table) {
            $table->uuid(Keys::ID)->primary();
            $table->enum(Keys::CODE, Common::getArrayValues(StaticFECData::getStaticData(TableData::COMMITTEE_TYPES), Keys::CODE))->index();
            $table->tinyInteger(Keys::LOCALIZATION_ID)->unsigned()->default(0);
            $table->string(Keys::NAME, 100);
            $table->text(Keys::DESCRIPTION)->nullable();
            $table->boolean(Keys::IS_PAC)->default(false);
            $table->boolean(Keys::IS_PARTY)->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TableData::COMMITTEE_TYPES[Keys::NAME]);
    }
};
