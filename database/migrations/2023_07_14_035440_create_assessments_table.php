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
        Schema::create('assessments', function (Blueprint $table) {
            $table->bigIncrements('id_assessment');
            $table->string('goal');
            $table->string('observation');
            $table->string('start_date');
            $table->string('term');
            $table->string('height');
            $table->string('weight');
            $table->string('arm');
            $table->string('forearm');
            $table->string('shoulder');
            $table->string('breastplate');
            $table->string('waist');
            $table->string('abdomen');
            $table->string('hip');
            $table->string('thigh');
            $table->string('calf');

            $table->bigInteger('id_user_fk')->unsigned();
            $table->foreign('id_user_fk')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
