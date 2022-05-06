<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Precinct;
use App\Models\Visitor;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private function getMunicipality($municipality)
    {
        return $municipality === null ? Auth::user()->municipality : ucwords($municipality);
    }

    private function validateMunicipality($municipality)
    {

        if(! in_array(ucwords($municipality), AccountController::validMuninicipalities())) {
            abort(404, '');
        }
    }
    public function index($municipality = null)
    {
        if(! is_null($municipality)) {
            $this->validateMunicipality($municipality);
        }
        
    
        $localCandidatesList = [];
        $nationalCandidatesList = [];

        $nationalCandidates = Candidate::where('location', '!=', $this->getMunicipality($municipality))->get();
        $localCandidates = Candidate::where('location',  $this->getMunicipality($municipality))
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
            $precincts = Precinct::where('municipality',  $this->getMunicipality($municipality))->get();
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
        return view('new-dashboard', ['localCandidates' => $localCandidatesList, 'nationalCandidates' => $nationalCandidatesList, 'municipality' => ucwords($municipality)]);
    }

    private function validPositions()
    {
        return [
            'mayor',
            'vice-mayor',
            'councilor'
        ];
    }

    private function isUniqueVisitor($ip)
    {
        return ! is_null(Visitor::where('ip', $ip)->first());
    }

    private function getNumberOfPageVisits()
    {
        return Visitor::count();
    }

    private function shouldStartLogging()
    {
        $startLoggingDateTime = Carbon::create(2022, 5, 9, 17, 0, 0, 'Asia/Singapore');
        
        $dateTimeNow = Carbon::now('Asia/Singapore');
       
        return $dateTimeNow->greaterThanOrEqualTo($startLoggingDateTime);
    }
    private function logVisit($ip)
    {
        if(! $this->shouldStartLogging()) {
            return;
        }

       if(! $this->isUniqueVisitor($ip)) {
            Visitor::create([
                'ip' => $ip
            ]);
       }
    }

    public function live(Request $request, $municipality = null, $position = null)
    {
        $this->logVisit($request->ip());

        if(! is_null($municipality)) {
            $this->validateMunicipality($municipality);
        }
        
        if(is_null($position) || ! in_array($position, $this->validPositions())) {
            return redirect("/live/$municipality/mayor");
        }

        $localCandidatesList = [];

        $localCandidates = Candidate::where('location',  $this->getMunicipality($municipality))
                                    ->where('position', $position)
                                    ->get();
        foreach($localCandidates as $localCandidate){
            array_push($localCandidatesList, [
                'name' => $localCandidate->name, 
                'position' => $localCandidate->position,
                'vote_count' => $localCandidate->votes()->sum('vote_count')
            ]);
        }
        $explodedPosition = $position === 'vice-mayor' ? explode('-', $position) : null;
        $cleanPosition = $explodedPosition != null ? ucwords($explodedPosition[0]).'-'.ucwords($explodedPosition[0]) : ucwords($position);

        return view('live-count', [
            'localCandidates' => $localCandidatesList,
            'municipality' => $municipality,
            'position' => $position,
            'cleanPosition' => $cleanPosition,
            'page_visits' => $this->getNumberOfPageVisits()
        ]);
    }
}
