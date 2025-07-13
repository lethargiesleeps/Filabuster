<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\TableData;
use App\Constants\Keys;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(TableData::PARTIES[Keys::NAME], function (Blueprint $table) {
            $table->uuid(Keys::ID)->primary();
            $table->string(Keys::CODE, 7)->index();
            $table->string(Keys::NAME, 100);
            $table->string(Keys::COUNTRY_CODE, 3);
            $table->tinyInteger(Keys::LOCALIZATION_ID)->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TableData::PARTIES[Keys::NAME]);
    }
};
