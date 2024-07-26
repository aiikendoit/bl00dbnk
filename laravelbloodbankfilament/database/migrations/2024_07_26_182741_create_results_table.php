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
        Schema::create('results', function (Blueprint $table) {
            // $table->id();
            $table->bigIncrements('id');
            $table->date('transaction_date')->nullable();
            $table->string('bgrh'); // A+- B+- AB+- O+-
            $table->string('result'); // positive - negative
            // $table->string('medtech'); //get user id who login
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); //user id
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete(); //patient id
            // $table->foreignId('created_by_user_id')->constrained()->cascadeOnDelete(); //user id
            $table->timestamps();
        });

        //auto increment starting value sqlite
        DB::statement('DELETE FROM sqlite_sequence WHERE name="results";');
        DB::statement('INSERT INTO sqlite_sequence (name, seq) VALUES ("results", 1000);');

        //mysql auto increment
        // DB::statement('ALTER TABLE patients AUTO_INCREMENT = 2024000;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
