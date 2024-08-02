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
        Schema::create('growers', function (Blueprint $table) {
            $table->id();
            $table->integer('grower_id')->comment('This is Klant_ID from the CSV, it is an ID that comes from an external system, we will just use it as reference but it has no functionality in our application right now, example: KW001, KW002, KW003');
            $table->unsignedBigInteger('person_id');
            $table->string('company_name');
            $table->string('contact_person')->nullable();
            $table->string('street');
            $table->string('city');
            $table->string('postal_code');
            $table->string('country');
            $table->string('website');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('growers');
    }
};