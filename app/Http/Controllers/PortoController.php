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

    function getPorto(Request $request)
    {
        $porto = Porto::all();
        return response()->json($porto);
    }

    function addPorto(Request $request)
    {
        $porto = new Porto();
        $porto->project_name = $request->project_name;
        $porto->description = $request->description;
        $porto->image = $request->image;
        $result=$porto->save();

        if($result){
            return ["Result"=>"Data has been saved"];
        }else
        {
            return ["Result"=>"Operation failed"];
        }
        return redirect()->route('dashboard');
    }

    function delete($id){
        return ["result"=>"record has been delete", $id];
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

    function update(Request $request)
    {
        return ["result"=>"data is updated"];
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
