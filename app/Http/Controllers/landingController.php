<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landingController extends Controller
{
    function index (Request $request)
    {
        return view('welcome');
    }
}
