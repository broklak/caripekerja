<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkerVerificationLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_verification_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('worker_id');
            $table->tinyInteger('type')->comment('1:KTP (ID CARD), 2:SKCK (POLICE REFERENCES)');
            $table->tinyInteger('status')->comment('0:not approved, 1:approved')->default(0);
            $table->integer('approved_by')->default(0);
            $table->timestamps();
        });

        Schema::table('workers', function (Blueprint $table) {
            $table->string('photo_ref', 50)->nullable()->after('photo_ktp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worker_verification_log');
        Schema::table('workers', function (Blueprint $table) {
            $table->dropColumn('photo_ref');
        });
    }
}
