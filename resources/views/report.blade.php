@extends('layout.main')

@section('title', 'Reports')

@include('layout.navbar')

@section('content')
<div class="row-">
    <div class="col-12">
    <div class="mt-5 px-2 py-3 border bg-white"><h4 class="text-primary text-center text-bold mb-1">Local Candidates - {{ ucwords(Auth::user()->municipality) }}</h4></div>
        <div class="border bg-white mt-2">
            <table class="table mb-0">
                <tbody>
                    <tr>
                        <td class="bg-dark"><h5 class="text-white mt-1">Candidates</h5></td>
                        @foreach($precincts as $precinct)
                        <td class="bg-dark"><h5 class="text-white mt-1">{{ $precinct->name }}</h5></td>
                        @endforeach
                    </tr>
                    <tr><td colspan="{{ count($precincts) + 1 }}"><h5 class="mt-1">Mayors</h5></td></tr>
                    <tr>
                        @foreach($localCandidates as $candidate)
                            @if($candidate['position'] === 'Mayor')
                            <tr>
                                <td>{{ $candidate['name'] }}</td>
                                @foreach($votes as $vote)
                                @foreach($precincts as $precinct)
                                    @if(($vote['candidate_id'] === $candidate['id']) && $precinct->id === $vote['precinct_id'])
                                    <td>{{ $vote['vote_count'] }}</td>
                                    @endif
                                @endforeach
                                @endforeach
                            </tr>
                            @endif
                        @endforeach
                    </tr>
                    <tr><td colspan="{{ count($precincts) + 1 }}"><h5 class="mt-1">Vice-Mayors</h5></td></tr>
                    <tr>
                        @foreach($localCandidates as $candidate)
                            @if($candidate['position'] === 'Vice-Mayor')
                            <tr>
                                <td>{{ $candidate['name'] }}</td>
                                @foreach($votes as $vote)
                                @foreach($precincts as $precinct)
                                    @if(($vote['candidate_id'] === $candidate['id']) && $precinct->id === $vote['precinct_id'])
                                    <td>{{ $vote['vote_count'] }}</td>
                                    @endif
                                @endforeach
                                @endforeach
                            </tr>
                            @endif
                        @endforeach
                    </tr>
                    <tr><td colspan="{{ count($precincts) + 1 }}"><h5 class="mt-1">Councilors</h5></td></tr>
                    <tr>
                        @foreach($localCandidates as $candidate)
                            @if($candidate['position'] === 'Councilor')
                            <tr>
                                <td>{{ $candidate['name'] }}</td>
                                @foreach($votes as $vote)
                                @foreach($precincts as $precinct)
                                    @if(($vote['candidate_id'] === $candidate['id']) && $precinct->id === $vote['precinct_id'])
                                    <td>{{ $vote['vote_count'] }}</td>
                                    @endif
                                @endforeach
                                @endforeach
                            </tr>
                            @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection