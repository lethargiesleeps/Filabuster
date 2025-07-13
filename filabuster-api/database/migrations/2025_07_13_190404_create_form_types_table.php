<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\TableData;
use App\Constants\Keys;
use App\Constants\StaticFECData;
use App\Helpers\Common;
use App\Enums\FormTypeCategory;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(TableData::FORM_TYPES[Keys::NAME], function (Blueprint $table) {
            $table->uuid(Keys::ID)->primary();
            $table->enum(Keys::CODE, Common::getArrayValues(StaticFECData::getStaticData(TableData::FORM_TYPES), Keys::CODE))->index();
            $table->string(Keys::NAME)->unique();
            $table->enum(Keys::CATEGORY, [
                FormTypeCategory::NOTICE->value,
                FormTypeCategory::REPORT->value,
                FormTypeCategory::STATEMENT->value,
                FormTypeCategory::OTHER->value
            ]);
            $table->tinyInteger(Keys::LOCALIZATION_ID)->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_types');
    }
};
