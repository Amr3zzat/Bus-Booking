<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stations')->delete();

        $stations = array(
            ['name' => 'Cairo'],
            ['name' => 'Giza'],
            ['name' => 'El Fayoum'],
            ['name' => 'AlMinya'],
            ['name' => 'Asyut'],
            ['name' => 'Qena']
        );
        DB::table('stations')->insert($stations);
    }
}
