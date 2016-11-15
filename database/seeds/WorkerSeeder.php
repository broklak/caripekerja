<?php

use Illuminate\Database\Seeder;

class WorkerSeeder extends Seeder
{
    var $_tableName = 'workers';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_tableName)->delete();
        $json = File::get("database/data/TableWorker.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table($this->_tableName)->insert([
                'id'            => $obj->id,
                'name'          => $obj->name,
                'email'         => $obj->email,
                'password'       => $obj->password,
                'phone'          => $obj->phone,
                'gender'        => $obj->gender,
                'degree'        => $obj->degree,
                'city'        => $obj->city,
                'birthdate'          => $obj->birthdate,
                'verified'          => 0,
                'marital'        => $obj->marital
            ]);
        }
    }
}
