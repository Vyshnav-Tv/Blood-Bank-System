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
        Schema::create('refrigerators', function (Blueprint $table) {

            $table->id();

            $table->foreignId('blood_bank_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');

            $table->string('serial_number')->unique();

            $table->string('location');

            $table->decimal('current_temperature', 4, 2)
                ->nullable();

            $table->timestamp('last_temperature_at')
                ->nullable();

            $table->enum('status', [
                'active',
                'inactive',
                'maintenance'
            ])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refrigerators');
    }
};
