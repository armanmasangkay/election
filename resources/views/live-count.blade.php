@extends('layout.live')

@section('title', 'Live Count')

@section('content')
<input type="hidden" name="" id="position" value="{{ $position }}">
<input type="hidden" name="" id="municipality" value="{{ $municipality }}">
<div class="row justify-content-center align-items-center">
    <div class="col-12 col-md-8">
        <div class="mt-4 mt-md-5">
            <div class="px-2 py-3 border bg-white shadow"><h1 class="text-primary text-center text-bold mb-1">Local Candidates - {{ ucwords($municipality) }}</h1></div>
            <div class="border mt-4 bg-white shadow">
                <table class="table table-condensed mb-0">
                    <tbody>
                        <tr>
                            <td colspan="2" class="border-bottom bg-dark"><h2 class="text-center text-white mt-1">{{ $cleanPosition.'s' }}</h2></td>
                        </tr>
                        <tr>
                            <th class="px-4"><h5>Candidates</h5></th>
                            <th class="px-4"><h5>Vote Counts</h5></th>
                        </tr>
                        @foreach($localCandidates as $localCandidate)
                        <tr>
                            <td class="px-4"><h4>{{ $localCandidate['name'] }}</h4></td>
                            <td class="px-4"><h4>{{ $localCandidate['vote_count'] }}</h4></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection