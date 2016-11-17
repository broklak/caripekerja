<?php

use Illuminate\Database\Seeder;

class ReferralSeeder extends Seeder
{
    var $_tableName = 'referral';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_tableName)->delete();
        $json = File::get("database/data/TableReferral.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table($this->_tableName)->insert([
                'id'        => $obj->id,
                'code'      => $obj->code,
                'user_id'   => $obj->user_id,
                'user_type' => $obj->user_type,
            ]);
        }
    }
}
