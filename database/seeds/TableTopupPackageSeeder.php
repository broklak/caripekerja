<?php

use Illuminate\Database\Seeder;

class TableTopupPackageSeeder extends Seeder
{
    var $_tableName = 'topup_package';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_tableName)->delete();
        $json = File::get("database/data/TablePackage.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table($this->_tableName)->insert([
                'id'            => $obj->id,
                'name'          => $obj->name,
                'price'         => $obj->price,
                'quota'       => $obj->quota,
            ]);
        }
    }
}
