<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Support\Collection;

interface BusRepositoryInterface
{
    public function checkSeat(int $from, int $to, int $seat, int $bus): bool;

    public function findBetweenRoutes(int $from, int $to, int $bus): Collection;

    public function findAvailableSeats(int $from, int $to, int $bus): Collection;

    public function findAllBuses(): Collection;
}
