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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->date('activity_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('collaborator_name', 255);
            $table->string('cpf', 14);
            $table->string('activity_name', 255);
            $table->string('mobile_number', 15);
            $table->string('room', 255);
            $table->string('company', 255);
            $table->string('responsible', 255);
            $table->string('materials_used', 255);
            $table->decimal('cordage_length', 10, 2);
            $table->string('from_row', 10);
            $table->char('from_rack', 1);
            $table->string('to_row', 10);
            $table->char('to_rack', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
