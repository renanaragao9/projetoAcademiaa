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
        Schema::create('fichas', function (Blueprint $table) {
            $table->bigIncrements('id_ficha');
            $table->string('order')->nullable();
            $table->string('serie');
            $table->string('repetition');
            $table->string('weight');
            $table->string('rest');
            $table->string('description')->nullable();

            $table->bigInteger('id_exercise_fk')->unsigned();
            $table->foreign('id_exercise_fk')->references('id_exercise')->on('exercises');

            $table->bigInteger('id_gmuscle_fk_to_ficha')->unsigned();
            $table->foreign('id_gmuscle_fk_to_ficha')->references('id_gmuscle')->on('muscleGroup');

            $table->bigInteger('id_user_fk')->unsigned();
            $table->foreign('id_user_fk')->references('id')->on('users');

            $table->bigInteger('id_user_creator_fk')->unsigned();
            $table->foreign('id_user_creator_fk')->references('id')->on('users');

            $table->bigInteger('id_training_fk')->unsigned();
            $table->foreign('id_training_fk')->references('id_training')->on('training_division');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichas');
    }
};
