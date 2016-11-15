<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmployers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone', 75)->nullable();
            $table->string('name_owner', 100)->nullable();
            $table->string('ukm_category', 10)->nullable();
            $table->string('city', 100)->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->string('referral_code')->nullable();
            $table->tinyInteger('verified')->comment('0:not verified, 1:verified')->default(0);
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
        Schema::dropIfExists('employers');
    }
}
