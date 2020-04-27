<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repository\BusRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ShowAvailableSeatsAction
{
    /** @var BusRepositoryInterface */
    private $busRepository;


    public function __construct(BusRepositoryInterface $busRepository)
    {
        $this->busRepository = $busRepository;
    }

    public function index(): JsonResponse
    {

        $availableSeats = $this->busRepository->findAvailableSeats((int)request()->query('from'), (int)request()->query('to'), (int)request()->query('bus'));

        return new JsonResponse($availableSeats);
    }
}
