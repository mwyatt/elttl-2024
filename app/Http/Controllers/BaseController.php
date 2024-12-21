<?php

namespace App\Http\Controllers;

use App\Infrastructure\Persistence\Eloquent\AdvertisementRepository;
use App\Infrastructure\Persistence\Eloquent\PressRepository;
use Inertia\Inertia;
use Inertia\Response;

class BaseController extends Controller
{
    public function __construct(
        private PressRepository         $pressRepository,
        private AdvertisementRepository $advertisementRepository,
    )
    {

    }

    public function index(): Response
    {
        return Inertia::render('Homepage', [
            'advertisementsPrimary' => $this->advertisementRepository->getViewGroup('home-primary', 1),
            'latestPress' => $this->pressRepository->getLatest(),
        ]);
    }
}
