<?php

declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReservationRoute extends Model
{
    protected $table = 'reservation_routes';

    protected $fillable = ['route', 'bus'];

}
