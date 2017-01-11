<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubscriber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriber', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 75);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        Schema::table('workers', function (Blueprint $table) {
            $table->integer('salary_min')->default(0);
            $table->integer('salary_max')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriber');

        Schema::table('workers', function (Blueprint $table) {
            $table->dropColumn('salary_min');
            $table->dropColumn('salary_max');
        });
    }
}
