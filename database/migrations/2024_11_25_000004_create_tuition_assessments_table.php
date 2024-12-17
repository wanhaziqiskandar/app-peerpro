<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tuition_assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tutor_id');
            // $table->unsignedBigInteger('request_id');
            $table->foreign('tutor_id')->references('id')->on('users');
            // $table->foreign('request_id')->references('id')->on('tuition_requests');
            // $table->string('expertise');
            $table->json('questions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tuition_assessments');
    }
};
