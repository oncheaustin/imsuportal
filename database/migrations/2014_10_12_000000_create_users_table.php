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
            $table->string('program',2);
            $table->string('phone',30);
            $table->string('appid',65);
            $table->string('appin',56)->nullable();;
            $table->string('addpin',56)->nullable();;
            $table->string('firstname',56);
            $table->string('lastname',56);
            $table->string('middlename',56);
            $table->string('pic',56);
            $table->string('email')->unique();  
            $table->string('password');
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
