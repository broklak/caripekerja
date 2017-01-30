<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWorkerForgetPassword extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_password_reset', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone', 25);
            $table->string('token', 10);
            $table->string('tokenUrl', 25);
            $table->tinyInteger('status')->default(0)->comment('0:unverified, 1:verified');
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
        Schema::dropIfExists('worker_password_reset');
    }
}
