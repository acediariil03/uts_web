<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Porto;

class dashboardController extends Controller
{
    function index (Request $request)
    {
        $porto = Porto::all();
        $totalPorto = Porto::count();
        return view('dashboard.dashboard',['porto'=> $totalPorto, 'totalPorto' => $totalPorto]);
    }

}
