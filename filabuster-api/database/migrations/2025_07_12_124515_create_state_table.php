<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\TableData;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(TableData::US_STATES['name'], function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code', 2)->unique();
            $table->string('name')->unique();
            $table->string('code_alt', 2)->nullable();
            $table->tinyInteger('localization_id')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TableData::US_STATES['name']);
    }
};
