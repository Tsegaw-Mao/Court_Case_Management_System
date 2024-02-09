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
        Schema::create('documentuploads', function (Blueprint $table) {
          $table->string('Doc_ID');
            $table->string('Doc_type');
            $table->string('Rel_Doc');
            $table->text('description');
            $table->timestamps('doc_enter');
            $table->timestamps('doc_modified');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentuploads');
    }
};

