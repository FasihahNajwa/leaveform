<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HODApplicationLeave;
use App\Models\ApplicationLeave;

class LookupController extends Controller
{
    public function counts(Request $request)
    {
        switch ($request->type){
            case 'h-o-d-application-leave':
                $count = 0;
                    if (user()->hasPermissionTo('Approved Leave Application')){
                        $count = $count + HODApplicationLeave::whereStatus('Permohonan Baru')->count();
                    }
                    if (user()->hasPermissionTo('Supported Leave Application')){
                        $count = $count + HODApplicationLeave::whereStatus('Diluluskan')->count();
                    }
                    return $count;
            case 'application-leave':
                $count = 0;
                    if (user()->hasPermissionTo('Approved Leave Application')){
                        $count = $count + ApplicationLeave::whereStatus('Permohonan Baru')->count();
                    }
                    if (user()->hasPermissionTo('Supported Leave Application')){
                        $count = $count + ApplicationLeave::whereStatus('Diluluskan')->count();
                    }
                    return $count;

        }
    }
}
