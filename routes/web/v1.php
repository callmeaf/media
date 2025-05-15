<?php

use Illuminate\Support\Facades\Route;

[
    $controllers,
    $prefix,
    $as,
    $middleware,
] = Base::getRouteConfigFromRepo(repo: \Callmeaf\Media\App\Repo\Contracts\MediaRepoInterface::class);

Route::resource($prefix, $controllers['medium'])->middleware($middleware);
// Route::prefix($prefix)->as($as)->middleware($middleware)->controller($controllers['medium'])->group(function () {
    // Route::get('trashed/list', 'trashed');
    // Route::prefix('{medium}')->group(function () {
        // Route::patch('/status', 'statusUpdate');
        // Route::patch('/type', 'typeUpdate');
        // Route::patch('/restore', 'restore');
        // Route::delete('/force', 'forceDestroy');
    // });
// });
