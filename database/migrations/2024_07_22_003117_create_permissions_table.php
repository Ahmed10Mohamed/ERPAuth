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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('page')->nullable();
            $table->foreignId("role_id")->nullable()->constrained("roles")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("page_id")->nullable()->constrained("pages")->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('is_read')->default(0);
            $table->boolean('is_create')->default(0);
            $table->boolean('is_update')->default(0);
            $table->boolean('is_delete')->default(0);
            $table->boolean('is_custom_update')->default(0);
            $table->boolean('is_custom_delete')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_permissions');
    }
};
