<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Precinct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $localCandidatesList = [];
        $voteList = [];

        $localCandidates = Candidate::where('location',  Auth::user()->municipality)
                            ->get();

        $precincts = Precinct::where('municipality', Auth::user()->municipality)->get();

        foreach($localCandidates as $localCandidate){

            foreach($precincts as $precinct){

                    foreach($localCandidate->votes()->get() as $votes){

                        if($votes->precinct_id === $precinct->id){
                            array_push($voteList, [
                                'candidate_id' => $votes->candidate_id,
                                'precinct_id' => $precinct->id,
                                'precinct' => $precinct->name,
                                'vote_count' => $votes->vote_count
                            ]);
                        }
                    }
            }
            
            array_push($localCandidatesList, [
                'id' => $localCandidate->id,
                'name' => $localCandidate->name, 
                'position' => $localCandidate->position
            ]);
        }

        return view('report', ['localCandidates'=>$localCandidatesList, 'votes'=>$voteList, 'precincts' => $precincts]);
    }
}
