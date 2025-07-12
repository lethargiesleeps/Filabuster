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
        Schema::create(TableData::OFFICE_TYPES['name'], function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('code', [
                'H', 'S', 'P'
            ])->unique();
            $table->tinyInteger('localization_id')->unsigned()->default(0);
            $table->string('name', 100)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TableData::OFFICE_TYPES['name']);
    }
};
