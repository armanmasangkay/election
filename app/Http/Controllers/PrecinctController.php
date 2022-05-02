<?php

namespace App\Http\Controllers;

use App\Models\Precinct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function deletePrecinct($precinctId)
    {
        $precinct = Precinct::findOrFail($precinctId);
        
        $precinct->delete();

        return back();
    }

    public function editPrencinct($precinctId)
    {
        $precinct = Precinct::findOrFail($precinctId);

        return view('edit-precinct', ['precinct' => $precinct]);
    }

    public function updatePrecinct(Request $request, $precinctId)
    {
        $precinct = Precinct::findOrFail($precinctId);

        $request->validate([
            'precinct_name' => ['required']
        ]);

        $precinct->name = Str::upper($request->precinct_name);

        $precinct->save();

        return redirect()->action([PrecinctController::class, 'precincts']);
    }
}
