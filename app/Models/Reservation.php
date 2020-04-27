<?php

declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    protected $fillable = ['bus', 'name', 'seat', 'from', 'to'];

    public function routes()
    {
        return $this->hasMany(ReservationRoute::class, 'reservation');
    }
}
