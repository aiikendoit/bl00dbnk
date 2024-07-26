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
        Schema::create('jobtask', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fk_transporter_user')->default(auth()->check() ? auth()->id() : null); //fk to user model select transporter
            $table->string('patientName')->nullable();
            $table->foreignId('fk_requester_user')->default(auth()->check() ? auth()->id() : null); //fk to user model select requester
            $table->string('department')->nullable();
            $table->timestamp('receivedDateTime')->nullable();
            $table->timestamp('leftDateTime')->nullable();
            $table->timestamp('returnedDatetime')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobtask');
    }
};
