<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('channel')->default('channel1');
            $table->string('gender')->default('male');
            $table->string('username')->default('abc');
            $table->string('interest')->default('a:5:{s:2:"i1";i:-1;s:2:"i2";i:-1;s:2:"i3";i:-1;s:2:"i4";i:-1;s:2:"i5";i:-1;}');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
