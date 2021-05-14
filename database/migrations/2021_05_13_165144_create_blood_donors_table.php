<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_donors', function (Blueprint $table) {
            $table->bigIncrements('donor_id');
            $table->string('name');
            $table->string('fathers_name');
            $table->string('gender');
            $table->date('dob');
            $table->string('blood_group');
            $table->integer('body_weight');
            $table->string('email');
            $table->string('pincode');
            $table->string('address');
            $table->string('contact_1');
            $table->string('contact_2');
            $table->string('voluntary');
            $table->string('voluntary_group')->nullable();

            $table->string('new_donor');
            $table->date('last_donation_date')->nullable();
            $table->string('image');

            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')
                ->references('area_id')->on('areas')
                ->onDelete('cascade');

            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')
                ->references('city_id')->on('cities')
                ->onDelete('cascade');

            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')
                ->references('state_id')->on('states')
                ->onDelete('cascade');

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')
                ->references('country_id')->on('countries')
                ->onDelete('cascade');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('blood_donors');
    }
}
