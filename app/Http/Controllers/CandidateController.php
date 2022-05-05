<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CandidateController extends Controller
{

    public function index()
    {
        return view('candidates', [
            'candidates' => Candidate::where(
                'location',
                Auth::user()->municipality
            )->get()
        ]);
    }
    public function addNew()
    {
        return view('addCandidates', [
            'positions' => Candidate::POSITIONS
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'position' => [Rule::in(Candidate::POSITIONS), 'required']
        ]);

        Candidate::create([
            'name' => str()->upper($request->name),
            'location' => Auth::user()->municipality,
            'position' => $request->position
        ]);

        return back()->with([
            'message' => 'Candidate successfully added!'
        ]);


    }
}
