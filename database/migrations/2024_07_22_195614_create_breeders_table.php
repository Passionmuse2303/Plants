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
        Schema::create('breeders', function (Blueprint $table) {
            $table->id();
            $table->integer('breeder_id')->comment('This will work the same as with Growers, example: BR001, BR002, BR003');
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
        Schema::dropIfExists('breeders');
    }
};
