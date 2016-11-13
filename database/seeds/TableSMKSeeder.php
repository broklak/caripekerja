<?php

use Illuminate\Database\Seeder;

class TableSMKSeeder extends Seeder
{
    var $_tableName = 'smk';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_tableName)->delete();
        $json = File::get("database/data/TableSMK.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table($this->_tableName)->insert([
                'nama_sekolah'  => $obj->nama_sekolah,
                'sekolah_id'    => $obj->sekolah_id,
                'nss'           => $obj->nss,
                'npsn'          => $obj->npsn,
                'status'        => $obj->status,
                'mbs'           => $obj->mbs,
                'alamat'        => $obj->alamat,
                'rt'            => $obj->rt,
                'rw'            => $obj->rw,
                'dusun'         => $obj->dusun,
                'kelurahan'     => $obj->kelurahan,
                'provinsi'      => $obj->provinsi,
                'kota'          => $obj->kota,
                'kecamatan'     => $obj->kecamatan,
                'kode_pos'      => $obj->kode_pos,
                'lintang'       => $obj->lintang,
                'bujur'         => $obj->bujur,
                'telp'          => $obj->telp,
                'fax'           => $obj->fax,
                'website'       => $obj->website,
                'email'         => $obj->email
            ]);
        }
    }
}
