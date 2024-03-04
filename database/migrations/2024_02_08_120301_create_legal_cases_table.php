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
            $table->string('Cause_of_Action')->nullable();
            $table->date('appointmentDate')->nullable();
            $table->string('status')->default('status1');
            $table->softDeletes('deleted_at');
            $table->string('plaintiff_UserId')->nullable();
            $table->string('attorney_UserId')->nullable();
            $table->string('lawyer_UserId')->nullable();
            $table->string('judge_UserId')->nullable();
            $table->string('detective_UserId')->nullable();
            $table->date('assignedDate')->nullable();
            $table->date('verdictedDate')->nullable();
            $table->boolean('warrant')->default(false);
            $table->boolean('bail')->default(false);
            $table->boolean('catch')->default(false);
            $table->boolean('detain')->default(false);
            $table->string('verdict')->nullable();
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
