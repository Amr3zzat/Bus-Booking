<?php

declare(strict_types=1);

use App\Model\Bus;
use App\Model\Seat;
use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Bus::class, 2)->create()->each(function ($bus) {
            $seats = factory(Seat::class, 12)->make();
            $bus->seats()->saveMany($seats);
        });
    }
}
