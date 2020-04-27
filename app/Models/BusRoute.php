<?php

declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    protected $table = 'bus_routes';

    public function fromStation()
    {
        return $this->belongsTo(Station::class, 'from');
    }

    public function toStation()
    {
        return $this->belongsTo(Station::class, 'to');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus');
    }
}
