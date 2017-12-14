<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->date('birth_date');
            $table->string('contact_no');
            $table->string('gender');
            $table->string('address');
            $table->string('city');
            $table->string('zip');
            $table->string('image_url')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('buyers');
    }
}
