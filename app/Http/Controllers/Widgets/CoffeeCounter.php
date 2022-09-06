<?php

namespace App\Http\Controllers\Widgets;

use App\Http\Controllers\Controller;
use App\Traits\DashboardWidgetTrait;

class CoffeeCounter extends Controller
{
    // this is needed for all dashboard widgets
    use DashboardWidgetTrait;

    // what the user will see the widget name as
    public function getWidgetName() : string
    {
        return 'Coffee Counter';
    }

    // return the view
    public function index()
    {
        return view('widgets.coffeecounter');
    }
}
