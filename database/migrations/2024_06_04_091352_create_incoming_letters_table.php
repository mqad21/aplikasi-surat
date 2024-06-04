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
        Schema::create('incoming_letters', function (Blueprint $table) {
            $table->id();
            $table->string('letter_number');
            $table->string('sender');
            $table->date('letter_date');
            $table->string('attachments')->nullable();
            $table->string('subject');
            $table->string('recipient');
            $table->text('content');
            $table->foreignId('publishing_unit_id');
            $table->string('letter_location');
            $table->foreignId('signer_id');
            $table->string('cc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_letters');
    }
};
