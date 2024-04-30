<?php

use Illuminate\Support\Facades\Route;

Route::prefix(config('callmeaf-base.api.prefix_url'))->as(config('callmeaf-base.api.prefix_route_name'))->middleware(config('callmeaf-base.api.middlewares'))->group(function() {
    Route::middleware(config('callmeaf-media.middlewares.global'))->group(function() {
        Route::prefix('media')->controller(config('callmeaf-media.controllers.media'))->group(function() {
            Route::delete('/{media}','destroy')->name('media.destroy');
        });
    });
});
