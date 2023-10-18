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
        Schema::create('calleds', function (Blueprint $table) {
            $table->bigIncrements('id_called');
            $table->string('user_name');
            $table->string('urgency')->nullable();
            $table->string('title');
            $table->string('subject');

            $table->bigInteger('id_instructor_fk')->unsigned();
            $table->foreign('id_instructor_fk')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('called');
    }
};
