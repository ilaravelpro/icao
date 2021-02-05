<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/4/21, 11:14 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIcaoNotamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icao_notams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key')->nullable();
            $table->string('location')->nullable();
            $table->string('subject')->nullable();
            $table->string('modifier')->nullable();
            $table->longText('message')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('icao_notams');
    }
}
