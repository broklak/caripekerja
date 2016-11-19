<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExpSkill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workers', function (Blueprint $table) {
            $table->text('experiences')->nullable();
            $table->text('skills')->nullable();
            $table->tinyInteger('status')->comment('0:not active, 1:active, 2:blacklisted')->default('1');
        });

        Schema::table('employers', function (Blueprint $table) {
            $table->tinyInteger('status')->comment('0:not active, 1:active, 2:blacklisted')->default('1');
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
            $table->dropColumn(['experiences', 'skills', 'status']);
        });

        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
