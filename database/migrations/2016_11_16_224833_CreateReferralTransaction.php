<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('referral_transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('user_type')->comment('1:worker, 2:ukm');
            $table->integer('referral_owner')->comment('user that own referral code');
            $table->integer('referral_user')->comment('user that user referral code');
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
        //
    }
}
