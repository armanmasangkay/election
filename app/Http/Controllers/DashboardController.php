<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Precinct;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index($municipality = null)
    {
        $localCandidatesList = [];
        $nationalCandidatesList = [];

        $nationalCandidates = Candidate::where('location', '!=', ucwords($municipality) ?? Auth::user()->municipality)->get();
        $localCandidates = Candidate::where('location', ucwords($municipality) ?? Auth::user()->municipality)
                                    ->orderByDesc('position')
                                    ->get();

        foreach($localCandidates as $localCandidate){
            array_push($localCandidatesList, [
                'name' => $localCandidate->name, 
                'position' => $localCandidate->position,
                'vote_count' => $localCandidate->votes()->sum('vote_count')
            ]);
        }

        foreach($nationalCandidates as $nationalCandidate){
            $precincts = Precinct::where('municipality', ucwords($municipality) ?? Auth::user()->municipality)->get();
            $vote_count = 0;

            foreach($precincts as $precinct){
                $vote_count += $nationalCandidate->votes()
                                                ->where('candidate_id', $nationalCandidate->id)
                                                ->where('precinct_id', $precinct->id)
                                                ->sum('vote_count');
            }

            array_push($nationalCandidatesList, [
                'name' => $nationalCandidate->name, 
                'position' => $nationalCandidate->position,
                'vote_count' => $vote_count
            ]);
        }

        // dd($nationalCandidatesList);
        return view('new-dashboard', ['localCandidates' => $localCandidatesList, 'nationalCandidates' => $nationalCandidatesList, 'municipality' => ucwords($municipality)]);
    }
}
