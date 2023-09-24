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
            $table->string('observation')->nullable();
            $table->string('term');
            $table->string('height');
            $table->string('weight');
            $table->string('arm')->nullable();
            $table->string('forearm')->nullable();
            $table->string('shoulder')->nullable();
            $table->string('breastplate')->nullable();
            $table->string('waist')->nullable();
            $table->string('abdomen')->nullable();
            $table->string('hip')->nullable();
            $table->string('thigh')->nullable();
            $table->string('calf')->nullable();

            $table->bigInteger('id_user_fk')->unsigned();
            $table->foreign('id_user_fk')->references('id')->on('users')->onDelete('cascade');

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
