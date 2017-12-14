<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
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
            $table->integer('user_id'); // patients are not obliged to have user ID!
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
        Schema::dropIfExists('admins');
    }
}
