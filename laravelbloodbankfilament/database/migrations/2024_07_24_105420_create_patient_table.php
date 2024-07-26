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
            $table->bigIncrements('id');
            $table->string('patientIdNo');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->integer('age');
            $table->string('gender');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        //auto increment starting value sqlite
        DB::statement('DELETE FROM sqlite_sequence WHERE name="patients";');
        DB::statement('INSERT INTO sqlite_sequence (name, seq) VALUES ("patients", 2024000);');

        //mysql auto increment
        // DB::statement('ALTER TABLE patients AUTO_INCREMENT = 2024000;');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
