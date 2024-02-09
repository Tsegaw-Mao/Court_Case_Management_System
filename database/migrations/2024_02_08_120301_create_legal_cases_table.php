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
        Schema::create('legal_cases', function (Blueprint $table) {
            $table->id();
            $table->string('Case_Id')->unique();
            $table->timestamps();
            $table->string('Case_Title');
            $table->string('Case_Type');
            $table->text('Case_Details');
            $table->string('Cause_of_Action')->default('null');
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_cases');
    }
};
