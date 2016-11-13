<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    var $_tableName = 'city';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_tableName)->delete();
        $json = File::get("database/data/TableCity.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table($this->_tableName)->insert([
                'id'            => $obj->id,
                'province_id'   => $obj->region_id,
                'name'          => $obj->name,
                'code'          => $obj->code
            ]);
        }
    }
}
