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
        Schema::create('tuition_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tutor_id');
            $table->unsignedBigInteger('tutee_id');
            $table->foreign('tutor_id')->references('id')->on('users');
            $table->foreign('tutee_id')->references('id')->on('users');
            $table->string('expertise');
            $table->date('date');
            $table->enum('timeslot', ['morning', 'afternoon', 'evening']);
            $table->enum('status', ['pending', 'accepted', 'rejected', 'canceled', 'completed'])->default('pending');
            $table->double('score')->default(0);
            $table->json('answers')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tuition_requests');
    }
};
