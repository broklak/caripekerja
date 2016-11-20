<?php

use Illuminate\Database\Seeder;

class TablePaymentMethodSeeder extends Seeder
{
    var $_tableName = 'payment_method';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->_tableName)->delete();
        $json = File::get("database/data/TablePaymentMethod.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table($this->_tableName)->insert([
                'id'            => $obj->id,
                'name'          => $obj->name,
                'account_name'         => $obj->account_name,
                'account_number'         => $obj->account_number,
                'type'       => $obj->type,
            ]);
        }
    }
}
