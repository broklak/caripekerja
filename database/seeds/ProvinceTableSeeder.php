<?php

use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{
    var $_tableName = 'province';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_tableName)->delete();
        $json = File::get("database/data/TableProvince.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table($this->_tableName)->insert([
                'id'        => $obj->id,
                'name'      => $obj->name,
                'code'      => $obj->code
            ]);
        }
    }
}
