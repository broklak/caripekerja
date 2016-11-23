<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVerifiedWorker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workers', function (Blueprint $table) {
            $table->tinyInteger('data_verified')->default(0)->comment('0:not verified, 1:verified');
            $table->tinyInteger('contact_verified')->default(0)->comment('0:not verified, 1:verified');
            $table->tinyInteger('exp_verified')->default(0)->comment('0:not verified, 1:verified');
            $table->text('education')->nullable();
        });

        Schema::table('employers', function (Blueprint $table) {
            $table->string('website')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workers', function (Blueprint $table) {
            $table->dropColumn('data_verified');
            $table->dropColumn('contact_verified');
            $table->dropColumn('exp_verified');
            $table->dropColumn('education');
        });

        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn('website');
        });
    }
}
