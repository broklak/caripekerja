<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSMK extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sekolah_id', 100);
            $table->string('nama_sekolah', 100);
            $table->string('nss');
            $table->string('npsn');
            $table->string('status', 100);
            $table->string('mbs');
            $table->text('alamat');
            $table->string('rt', 50);
            $table->string('rw', 50);
            $table->string('dusun', 100);
            $table->string('kelurahan', 100);
            $table->string('provinsi', 100);
            $table->string('kota', 100);
            $table->string('kecamatan', 100);
            $table->string('kode_pos', 50);
            $table->string('lintang', 100);
            $table->string('bujur', 100);
            $table->string('telp', 50);
            $table->string('fax', 50);
            $table->string('website', 100);
            $table->string('email', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smk');
    }
}
