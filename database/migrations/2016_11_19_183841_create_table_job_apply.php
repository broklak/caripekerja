<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJobApply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_apply', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('worker_id');
            $table->integer('job_id');
            $table->tinyInteger('status')->comment('0:not reviewed, 1:shortlisted, 2:not suitable, 3:called')->default(0);
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
        Schema::dropIfExists('job_apply');
    }
}
