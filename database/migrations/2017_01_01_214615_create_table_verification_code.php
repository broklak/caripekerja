<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVerificationCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verification_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->integer('worker_id');
            $table->tinyInteger('status')->comment('0:new, 1:activated')->default(0);
            $table->timestamps();
        });

        Schema::table('workers', function (Blueprint $table) {
            $table->integer('rating')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verification_codes');

        Schema::table('workers', function (Blueprint $table) {
            $table->dropColumn('rating');
        });
    }
}
