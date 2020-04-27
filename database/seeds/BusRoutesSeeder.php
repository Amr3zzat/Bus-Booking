<?php

use Illuminate\Database\Seeder;

class BusRoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bus_routes')->delete();

        $routes = array(
            ['from' => 1, 'to' => 2, 'order' => 1, 'bus' => 1],
            ['from' => 2, 'to' => 3, 'order' => 1, 'bus' => 1],
            ['from' => 3, 'to' => 4, 'order' => 2, 'bus' => 1],
            ['from' => 4, 'to' => 5, 'order' => 3, 'bus' => 1],
            ['from' => 5, 'to' => 6, 'order' => 4, 'bus' => 1],
        );
        DB::table('bus_routes')->insert($routes);
    }
}
