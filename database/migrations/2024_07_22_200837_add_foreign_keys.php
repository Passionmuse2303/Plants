<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('samples', function (Blueprint $table) {
            $table->foreign('variety_report_id')->references('id')->on('variety_reports')->onDelete('cascade');
        });

        Schema::table('growers', function (Blueprint $table) {
            $table->foreign('person_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('breeders', function (Blueprint $table) {
            $table->foreign('person_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('variety_reports', function (Blueprint $table) {
            $table->foreign('breeder_id')->references('id')->on('breeders')->onDelete('cascade');
            $table->foreign('grower_id')->references('id')->on('growers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('samples', function (Blueprint $table) {
            $table->dropForeign(['variety_report_id']);
        });

        Schema::table('growers', function (Blueprint $table) {
            $table->dropForeign(['person_id']);
        });

        Schema::table('breeders', function (Blueprint $table) {
            $table->dropForeign(['person_id']);
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('variety_reports', function (Blueprint $table) {
            $table->dropForeign(['breeder_id']);
            $table->dropForeign(['grower_id']);
        });
    }
};