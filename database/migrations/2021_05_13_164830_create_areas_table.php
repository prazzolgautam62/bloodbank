<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->bigIncrements('area_id');
            $table->string('area_name')->unique();

            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')
                ->references('city_id')->on('cities')
                ->onDelete('cascade');

            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')
                ->references('state_id')->on('states')
                ->onDelete('cascade');
            $table->string('latitude');
            $table->string('longitude');

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
        Schema::dropIfExists('areas');
    }
}
