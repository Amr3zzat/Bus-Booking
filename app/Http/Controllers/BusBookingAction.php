<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ReserveSeatRequest;
use App\Model\Reservation;
use App\Repository\BusRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BusBookingAction extends Controller
{
    /** @var BusRepositoryInterface */
    private $busRepository;


    public function __construct(BusRepositoryInterface $busRepository)
    {
        $this->busRepository = $busRepository;
    }

    public function reserve(ReserveSeatRequest $request): JsonResponse
    {


        /** @var boolean $seatAvailable */
        $seatAvailable = $this->busRepository->checkSeat(
            (int)$request->get('from'), (int)$request->get('to'),
            (int)$request->get('seat'), (int)$request->get('bus'));

        if (!$seatAvailable) {
            return new JsonResponse(['message' => 'The Selected Seat in unavailable, check available seats first'], 400);
        }

        $allRoutes = $this->busRepository->findBetweenRoutes((int)$request->get('from'), (int)$request->get('to'), (int)$request->get('bus'));

        if (!$allRoutes->count()) {
            throw new NotFoundHttpException('No routes matched with entered Bus');
        }

        $reservation = new Reservation();
        $reservation->name = $request->get('name');
        $reservation->bus = $request->get('bus');
        $reservation->seat = $request->get('seat');
        $reservation->save();

        foreach ($allRoutes as $route) {
            $reservation->routes()->create(['route' => $route]);
        }
        $reservation->save();

        return new JsonResponse(['message' => 'booked']);

    }

}
