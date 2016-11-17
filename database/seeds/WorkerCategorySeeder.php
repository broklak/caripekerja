<?php

use Illuminate\Database\Seeder;

class WorkerCategorySeeder extends Seeder
{
    var $_tableName = 'worker_category';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_tableName)->delete();
        $json = File::get("database/data/TableWorkerCategory.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table($this->_tableName)->insert([
                'id'            => $obj->id,
                'name'          => $obj->name,
                'url'         => $obj->url,
                'status'       => 1,
            ]);
        }
    }
}
