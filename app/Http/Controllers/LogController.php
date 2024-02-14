<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function visits(Request $request)
    {

        //dd($userAgent = $request->header('User-Agent'));
        $visits = Visit::filter()->latest()->paginate(50);
        return view('admin.log.visits', compact('visits','request'));
    }
}
