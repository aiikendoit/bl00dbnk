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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patientIdNo');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->integer('age');
            $table->string('gender');
            $table->unsignedBigInteger('created_by')->nullable(); // Add this column
            $table->timestamps();
        });
        // Add foreign key constraint
        Schema::table('patients', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
