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
        Schema::create(TableData::OFFICE_TYPES[Keys::NAME], function (Blueprint $table) {
            $table->uuid(Keys::ID)->primary();
            $table->enum(Keys::CODE, Common::getArrayValues(StaticFECData::getStaticData(TableData::OFFICE_TYPES), Keys::CODE))->index();
            $table->tinyInteger(Keys::LOCALIZATION_ID)->unsigned()->default(0);
            $table->string(Keys::NAME, 100)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TableData::OFFICE_TYPES[Keys::NAME]);
    }
};
