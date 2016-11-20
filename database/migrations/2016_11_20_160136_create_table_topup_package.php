<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTopupPackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topup_package', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('price');
            $table->integer('quota');
            $table->tinyInteger('status')->comment('0:not active, 1:active')->default(1);
            $table->timestamps();
        });

        Schema::create('topup_transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('employer_id');
            $table->integer('package_id');
            $table->integer('payment_method_id');
            $table->tinyInteger('status')->comment('0:unpaid, 1:paid, 2:confirmed')->default(0);
            $table->timestamps();
        });

        Schema::create('worker_transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employer_id');
            $table->integer('worker_id');
            $table->tinyInteger('status')->comment('1:shortlisted, 2:suitable, 3:not suitable')->default(1);
            $table->timestamps();
        });

        Schema::create('transfer_confirmation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('package');
            $table->string('account_number');
            $table->string('account_name');
            $table->integer('amount');
            $table->integer('transfer_to');
            $table->timestamps();
        });

        Schema::create('payment_method', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();
            $table->integer('type')->comment('1:manual approval, 2:automatic approval');
            $table->tinyInteger('status')->comment('0:active, 1:not active')->default(1);
            $table->timestamps();
        });

        Schema::table('employers', function (Blueprint $table) {
            $table->integer('quota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topup_package');
        Schema::dropIfExists('topup_transaction');
        Schema::dropIfExists('worker_transaction');
        Schema::dropIfExists('payment_method');
        Schema::dropIfExists('transfer_confirmation');

        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn('quota');
        });
    }
}
