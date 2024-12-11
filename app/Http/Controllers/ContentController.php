<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Models\ContentModel;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ContentModel $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContentModel $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContentRequest $request, ContentModel $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContentModel $content)
    {
        //
    }
}
