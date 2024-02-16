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
        Schema::create('clerk_legal_case', function (Blueprint $table) {
            $table->id();
            $table->string('legal_case_Case_Id');
            $table->string('clerk_UserId');
            $table->timestamps();

            $table->foreign('legal_case_Case_Id')->references('Case_Id')->on('legal_cases')->onDelete('cascade');
            $table->foreign('clerk_UserId')->references('UserId')->on('clerks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clerk_legal_case');
    }
};
