<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Porto;
use Illuminate\Support\Facades\Redis;

class PortoController extends Controller
{
    function index (Request $request)
    {
        $porto = Porto::all();
        return view('dashboard.table', compact('porto'));
    }

    function addPorto(Request $request)
    {
        $porto = new Porto();
        $porto->project_name = $request->project_name;
        $porto->description = $request->description;
        $porto->image = $request->image;
        $porto->save();

        return redirect()->route('dashboard');
    }

    function deletePorto(Request $request)
    {
        $porto = porto::find($request->id);
        $porto->delete();

        if($porto){
            return back()->with('success', 'Porto Deleted Success!');
        }else{
            return back()->with('fail', 'Try Again!');
        }
    }

    function updatePorto(Request $request)
    {
        $porto = Porto::find($request->id);
        $porto->project_name = $request->project_name;
        $porto->description = $request->description;
        $porto->image = $request->image;
        $porto->save();

        if($porto){
            return back()->with('success', 'Porto Updated Success!');
        }else{
            return back()->with('fail', 'Try Again!');
        }
    }
}
