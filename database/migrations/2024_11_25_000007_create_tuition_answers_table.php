<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assessment_id');
            $table->text('answer');
            $table->timestamps();
            $table->foreign('assessment_id')->references('id')->on('tuition_assessments');
        });
    }

    public function down()
    {
        Schema::dropIfExists('answers');
    }
};
