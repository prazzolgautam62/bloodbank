<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('gender');
            $table->string('blood_group');
            $table->integer('blood_unit');
            $table->text('hospital');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')
                ->references('city_id')->on('cities')
                ->onDelete('cascade');
            $table->string('pincode');
            $table->string('doctor_name');
            $table->date('required_date');
            $table->string('contact_name');
            $table->string('contact_address');
            $table->string('contact_no1');
            $table->string('contact_no2');
            $table->text('reason');
            $table->string('image');
            $table->integer('status')->default(1);
            $table->date('completed_date')->nullable();
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
        Schema::dropIfExists('blood_requests');
    }
}
