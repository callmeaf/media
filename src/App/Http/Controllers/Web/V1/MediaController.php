<?php

namespace Callmeaf\Media\App\Http\Controllers\Web\V1;

use Callmeaf\Base\App\Http\Controllers\Web\V1\WebController;
use Callmeaf\Media\App\Repo\Contracts\MediaRepoInterface;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class MediaController extends WebController implements HasMiddleware
{
    public function __construct(protected MediaRepoInterface $mediumRepo)
    {
        parent::__construct($this->mediumRepo->config);
    }

    public static function middleware(): array
    {
        return [
           //
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->mediumRepo->latest()->search()->paginate();
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
    public function store()
    {
        return $this->mediumRepo->create(data: $this->request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->mediumRepo->findById(value: $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        return $this->mediumRepo->update(id: $id, data: $this->request->validated());
    }

    public function statusUpdate(string $id)
    {
        return $this->mediumRepo->update(id: $id, data: $this->request->validated());
    }

    public function typeUpdate(string $id)
    {
        return $this->mediumRepo->update(id: $id, data: $this->request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->mediumRepo->delete(id: $id);
    }

    public function trashed()
    {
        return $this->mediumRepo->trashed()->latest()->search()->paginate();
    }

    public function restore(string $id)
    {
        return $this->mediumRepo->restore(id: $id);
    }

    public function forceDestroy(string $id)
    {
        return $this->mediumRepo->forceDelete(id: $id);
    }
}
