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
        Schema::disableForeignKeyConstraints();
        Schema::create('appointements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctorID');
            $table->foreign('doctorID')->references('id')->on('doctors');
            $table->unsignedBigInteger('patientID')->nullable();
            $table->foreign('patientID')->references('id')->on('patients');
            $table->enum('bookingHour',['8:00', '9:00', '10:00', '11:00','12:00', '2:00', '3:00', '4:00', '5:00']);
            $table->date('date');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointements');
    }
};
