<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExplorerRequest;
use App\Http\Requests\UpdateExplorerRequest;
use App\Models\Explorer;

class ExplorerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExplorerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Explorer $explorer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExplorerRequest $request, Explorer $explorer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Explorer $explorer)
    {
        //
    }
}
