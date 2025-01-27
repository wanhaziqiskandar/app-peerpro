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
        Schema::create('tutor_subject', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tutor_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('assessment_id')->nullable();
            $table->text('material_link')->nullable();
            $table->boolean('is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_subject');
    }
};
