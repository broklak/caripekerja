<?php

use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    var $_tableName = 'jobs';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_tableName)->delete();
        $json = File::get("database/data/TableJob.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table($this->_tableName)->insert([
                'id'            => $obj->id,
                'employer_id'   => $obj->employer_id,
                'title'         => $obj->title,
                'description'   => $obj->description,
                'city'          => $obj->city,
                'minimum_degree' => $obj->minimum_degree,
                'gender'        => $obj->gender,
                'closing_date'  => $obj->closing_date,
                'salary'        => $obj->salary,
                'type'          => $obj->type,
                'status'        => $obj->status
            ]);
        }
    }
}
