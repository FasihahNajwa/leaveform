<?php

/*
|--------------------------------------------------------------------------
| Backpack\Settings Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are
| handled by the Backpack\Settings package.
|
*/

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => 'App\Http\Controllers',
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', backpack_middleware(), 'can:Manage Settings'],
], function () {
    Route::crud('setting', 'SettingCrudController');
});
