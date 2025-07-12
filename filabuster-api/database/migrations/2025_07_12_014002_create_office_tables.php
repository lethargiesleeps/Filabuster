<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('office_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('code', [
                'H', 'S', 'P'
            ]);
            $table->integer('localization_id')->unsigned()->default(0);
            $table->string('name', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_tables');
    }
};
