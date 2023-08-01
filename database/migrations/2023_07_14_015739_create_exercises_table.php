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
        Schema::create('exercises', function (Blueprint $table) {
            $table->bigIncrements('id_exercise');
            $table->string('name_exercise', 180);
            $table->string('image_exercise')->default('default_image');
            $table->bigInteger('id_gmuscle_fk')->unsigned();
            $table->foreign('id_gmuscle_fk')->references('id_gmuscle')->on('muscle_groups');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
