<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIcaoRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icao_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable()->default('arcgis');
            $table->string('service')->nullable();
            $table->string('server')->nullable();
            $table->string('method')->nullable();
            $table->text('params')->nullable();
            $table->text('hash')->nullable();
            $table->longText('response')->nullable();
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
        Schema::dropIfExists('icao_requests');
    }
}
