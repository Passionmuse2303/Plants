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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key
            $table->string('username');
            $table->string('email')->unique();
            $table->unsignedBigInteger('phonenumber')->nullable();
            $table->string('password');
            $table->string('role')->default('user');
            $table->boolean('activate')->comment('user activation')->default(true);
            $table->timestamps();
            $table->timestamp('last_login')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};