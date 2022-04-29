<?php

namespace App\Http\Controllers;

use App\Models\Precinct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrecinctController extends Controller
{
    public function precincts()
    {
        $precincts = Precinct::where(
            'municipality',
            Auth::user()->municipality
        )->get();
        
        return view('precincts', ['precincts' => $precincts]);
    }

    public function newPrecinct(Request $request)
    {
        $request->validate([
            'precinct_name' => ['required']
        ]);

        Precinct::create([
            'name' => str()->upper($request->precinct_name),
            'municipality' =>  Auth::user()->municipality
        ]);

        return back();
    }
}
