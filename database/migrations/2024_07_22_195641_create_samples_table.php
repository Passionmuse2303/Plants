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
        Schema::create('samples', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key
            $table->unsignedBigInteger('variety_report_id');
            $table->date('sample_date');
            $table->string('leaf_color');
            $table->integer('amount_branches');
            $table->integer('flower_buds');
            $table->string('branch_color');
            $table->string('roots');
            $table->string('flower_color');
            $table->integer('flower_petals');
            $table->string('flowering_time');
            $table->string('length_flowering');
            $table->boolean('seeds');
            $table->string('seeds_color');
            $table->integer('amount_seeds');
            $table->string('image_urls')->nullable()->comment('There must be the possibility to upload multiple pictures');
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('samples');
    }
};
