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
        Schema::create('custom_updates', function (Blueprint $table) {
            $table->id();
            $table->string('col')->nullable();
            $table->string('exp')->nullable();
            $table->string('db_type')->nullable();
            $table->string('value')->nullable();
            $table->string('page_custom')->nullable();
            $table->string('page_type')->nullable();
            $table->foreignId("permition_id")->nullable()->constrained("permissions")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_updates');
    }
};
