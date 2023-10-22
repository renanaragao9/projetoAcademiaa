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
        Schema::create('statistics', function (Blueprint $table) {
            $table->bigIncrements('id_statistic');
            
            $table->bigInteger('id_user_fk')->unsigned();
            $table->foreign('id_user_fk')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('id_ficha_fk')->unsigned();
            $table->foreign('id_ficha_fk')->references('id_ficha')->on('fichas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
