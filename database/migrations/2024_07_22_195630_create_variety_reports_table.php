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
        Schema::create('variety_reports', function (Blueprint $table) {
            $table->id();
            $table->string('variety_name');
            $table->unsignedBigInteger('grower_id')->comment('To connect with grower and to get grower name');
            $table->unsignedBigInteger('breeder_id')->comment('To get breeder name');
            $table->integer('amount_plants');
            $table->string('pot_size');
            $table->string('trial_location');
            $table->string('image_url');
            $table->boolean('pot_trial');
            $table->boolean('open_field_trial');
            $table->date('date_propagation');
            $table->date('date_potting');
            $table->date('date_planned_sample')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variety_reports');
    }
};
