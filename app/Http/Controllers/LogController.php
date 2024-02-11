<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function visits()
    {
        $visits = Visit::latest()->paginate(30);
        // dd($visits->total());
        return view('admin.log.visits', compact('visits'));
    }
}
