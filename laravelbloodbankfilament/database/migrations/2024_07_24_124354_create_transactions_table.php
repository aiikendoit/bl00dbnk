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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->string('transactionNo');
            $table->date('transactionDate');
            $table->enum('bgrh', [
                ' "A" POSITIVE',
                ' "A" NEGATIVE"',
                '"B" POSITIVE',
                ' "B" NEGATIVE"',
                '"AB" POSITIVE',
                ' "AB" NEGATIVE"',
                '"O" POSITIVE',
                ' "O" NEGATIVE"',
            ]);
            $table->enum('result', ['positive', 'negative']);
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // user id login
            $table->foreignId('patient_id')->constrained()->onDelete('cascade'); // Assuming a transaction is linked to a patient

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
