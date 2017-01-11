<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRatingStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('worker_transaction', function (Blueprint $table) {
            $table->integer('rating')->default(0)->after('status');
            $table->text('notes')->nullable()->after('rating');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('worker_transaction', function (Blueprint $table) {
            $table->dropColumn('rating');
            $table->dropColumn('notes');
        });
    }
}
