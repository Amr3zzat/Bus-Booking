<?php

declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'buses';

    public function routes()
    {
        return $this->hasMany(BusRoute::class, 'bus');
    }

    public function seats()
    {
        return $this->hasMany(Seat::class, 'bus');
    }
}
