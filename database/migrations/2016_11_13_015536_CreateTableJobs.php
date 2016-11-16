<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employer_id');
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->integer('city');
            $table->string('minimum_degree')->nullable();
            $table->integer('gender')->comment('1:Must Male, 2=Must Female')->nullable();
            $table->date('closing_date')->nullable();
            $table->integer('salary_min');
            $table->integer('salary_max');
            $table->tinyInteger('type')->comment('1:full time, 2 : Part time');
            $table->integer('status')->comment('0:Not Active, 1 : Active');
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
        Schema::dropIfExists('jobs');
    }
}
