<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLocationRequest;
use App\Infrastructure\Persistence\Eloquent\LocationRepository;
use Inertia\Inertia;
use Inertia\Response;

class AdminLocationController extends Controller
{
    public function __construct(private LocationRepository $locationRepository)
    {
    }

    public function index(): Response
    {
        return Inertia::render('Admin/Location/Index', [
            'locations' => $this->locationRepository->getAll(),
        ]);
    }

    public function edit(int $id): Response
    {
        return Inertia::render('Admin/Location/Edit', [
            'location' => $this->locationRepository->getById($id),
        ]);
    }

    public function update(AdminLocationRequest $request, int $id): Response
    {
        $validated = $request->validated();

        $this->locationRepository->update(
            $id,
            $validated['name'],
            $validated['slug'],
            $validated['location'],
        );

        return Inertia::render('Admin/Location/Edit', [
            'location' => $this->locationRepository->getById($id),
        ]);
    }
}
