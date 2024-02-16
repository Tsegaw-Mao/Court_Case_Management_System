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
        Schema::create('defendant_legal_case', function (Blueprint $table) {
            $table->id();
            $table->string('legal_case_case_id');
            $table->string('defendant_userId');
            $table->timestamps();

            $table->foreign('legal_case_case_id')->references('Case_Id')->on('legal_cases')->onDelete('cascade');
            $table->foreign('defendant_userId')->references('UserId')->on('defendants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defendant_legal_case');
    }
};
