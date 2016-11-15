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
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone', 75)->unique();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('password');
            $table->tinyInteger('gender')->nullable();
            $table->string('degree', 10)->nullable();
            $table->string('city', 100)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('referral_code')->nullable();
            $table->tinyInteger('marital')->nullable();
            $table->tinyInteger('verified')->comment('0:not verified, 1:verified')->default(0);
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
        Schema::drop('workers');
    }
}
