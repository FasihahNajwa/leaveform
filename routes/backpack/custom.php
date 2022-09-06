<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

use Illuminate\Support\Facades\Route;

// Protect your routes with 'can:Manage System' middleware!!

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::group(['middleware' => 'can:Manage Leave Types'], function(){
        Route::crud('leave-type', 'LeaveTypeCrudController');
    });
    Route::group(['middleware' => 'can:Manage Departments'], function(){
        Route::crud('department', 'DepartmentCrudController');
    });
    Route::group(['middleware' => 'can:Manage Head Departments'], function(){
        Route::crud('head-department', 'HeadDepartmentCrudController');
    });
    Route::group(['middleware' => 'can:Manage Application Leaves'], function(){
        Route::crud('application-leave', 'ApplicationLeaveCrudController');
    });
    Route::group(['middleware' => 'can:Manage Emergency Contacts'], function(){
        Route::crud('emergency-contacts', 'EmergencyContactsCrudController');
    });
    Route::group(['middleware' => 'can:Manage Entitlements'], function(){
        Route::crud('entitlement', 'EntitlementCrudController');
    });
    Route::group(['middleware' => 'can:Manage Positions'], function(){
        Route::crud('position', 'PositionCrudController');
    });
}); // this should be the absolute last line of this file