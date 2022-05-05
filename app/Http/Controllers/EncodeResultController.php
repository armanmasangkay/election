<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\PpcrvPrecinct;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class EncodeResultController extends Controller
{
    private function getAuthenticatedUsersPrecinctId()
    {
        $ppcrvPrecinct = PpcrvPrecinct::where('user_id', Auth::user()->id)->first();
        return $ppcrvPrecinct->precinct_id;
    }

    private function ppcrvUserHasAlreadySubmitted($ppcrvPrecinctId)
    {
        $data = Vote::where('precinct_id', $ppcrvPrecinctId)->first() ? true : false;

        return $data;
    }

    public function index()
    {
       $ppcrvPrecinctId = $this->getAuthenticatedUsersPrecinctId();
 
       if($this->ppcrvUserHasAlreadySubmitted($ppcrvPrecinctId)) {
            return view('encode-result',[
                    'error'=>'Votes are already submitted from the precinct you are assigned to.',   
            ]);
       }

        $presidents = Candidate::where('position', 'President')->get();

        $vicePresidents = Candidate::where('position', 'Vice-President')->get();

        $senators = Candidate::where('position', 'Senators')->get();

        $governors = Candidate::where('position', 'Governor')->get();

        $viceGovernors = Candidate::where('position', 'Vice-Governor')->get();

        $sgFirsts = Candidate::where('position', 'Sangguniang Panlalawigan-First District')->get();

        $sgSeconds = Candidate::where('position', 'Sangguniang Panlalawigan-Second District')->get();

        $hgFirsts = Candidate::where('position', 'House of Representatives-First District')->get();

        $hgSeconds = Candidate::where('position', 'House of Representatives-Second District')->get();

        $mayors = Candidate::where('position', 'Mayor')
                            ->where('location', Auth::user()->municipality)
                            ->get();
        $councilors = Candidate::where('position', 'Councilor')
                            ->where('location', Auth::user()->municipality)
                            ->get();

        return view('encode-result', [
            'error' => '',
            'presidents' => $presidents,
            'vice_presidents' => $vicePresidents,
            'senators' => $senators,
            'governors' => $governors,
            'vice_governors' => $viceGovernors,
            'sg_firsts' => $sgFirsts,
            'sg_seconds' => $sgSeconds,
            'hgFirsts' => $hgFirsts,
            'hgSeconds' => $hgSeconds,
            'mayors' => $mayors,
            'councilors' => $councilors
        ]);
    }

    public function storeResult(Request $request)
    {
        $rules = Arr::except(array_fill_keys(array_keys($request->all()), [
            'numeric',
            'integer'
        ]),['_token']);
        
        $request->validate($rules);

        $ppcrvPrecinct = PpcrvPrecinct::where('user_id', Auth::user()->id)->first();

        foreach(Arr::except($request->all(), ['_token']) as $key=>$value) {
            Vote::create([
                'precinct_id' => $ppcrvPrecinct->precinct_id,
                'candidate_id' => explode("_",$key)[1],
                'vote_count' => $request->input($key)
            ]);
        }

        return redirect('/')->with('message', 'Results submitted successfully!');

    }
}
