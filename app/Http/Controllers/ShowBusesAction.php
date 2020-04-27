<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repository\BusRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ShowBusesAction extends Controller
{
    /** @var BusRepositoryInterface */
    private $busRepository;


    public function __construct(BusRepositoryInterface $busRepository)
    {
        $this->busRepository = $busRepository;
    }

    public function index(): JsonResponse
    {
        $buses = $this->busRepository->findAllBuses();
        return new JsonResponse($buses, 200);
    }
}
