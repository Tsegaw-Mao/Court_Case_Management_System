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
        Schema::create('detectives', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("UserId")->unique();
            $table->string("FirstName");
            $table->string("LastName");
            $table->string("email");
            $table->string("address");;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detectives');
    }
};