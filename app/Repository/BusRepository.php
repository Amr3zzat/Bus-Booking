<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Bus;
use App\Model\BusRoute;
use App\Model\Reservation;
use App\Model\Seat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class BusRepository implements BusRepositoryInterface
{

    public function checkSeat(int $from, int $to, int $seat, int $bus): bool
    {
        $allRoutes = $this->findBetweenRoutes($from, $to, $bus);

        $reservedSeats = Reservation::query()->where('seat', $seat)->whereHas('routes',
            static function (Builder $query) use ($allRoutes) {
                $query->wherein('route', $allRoutes);
            })->count();
        return $reservedSeats < 1;
    }


    public function findBetweenRoutes(int $from, int $to, int $bus): Collection
    {
        $src = BusRoute::query()->where('from', $from)->where('bus', $bus)->firstOrFail();
        $dest = BusRoute::query()->where('to', $to)->where('bus', $bus)->firstOrFail();
        return BusRoute::query()->where('bus', request()->get('bus'))->whereBetween('order', [$src->order, $dest->order])->get()->pluck('id');
    }

    public function findAvailableSeats(int $from, int $to, int $bus): Collection
    {
        $allRoutes = $this->findBetweenRoutes($from, $to, $bus);
        $reservedSeats = Reservation::query()->whereHas('routes',
            static function (Builder $query) use ($allRoutes) {
                $query->wherein('route', $allRoutes);
            })->get()->pluck('seat');

        return Seat::query()->where('bus', request()->query('bus'))->whereNotIn('id', $reservedSeats)->select(['id', 'code'])->get();
    }

    public function findAllBuses(): Collection
    {
        return Bus::with(['routes:id,bus,from,to,order', 'routes.fromStation:id,name', 'routes.toStation:id,name', 'seats:id,code,bus'])->select(['id', 'code', 'capacity'])->get();
    }
}
