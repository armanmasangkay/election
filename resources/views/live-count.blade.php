@extends('layout.live')

@section('title', 'Live Count')

@section('content')
<input type="hidden" name="" id="position" value="{{ $position }}">
<input type="hidden" name="" id="municipality" value="{{ $municipality }}">
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
    <div class="mt-4 mt-md-5">
            <div class="px-2 py-3 border bg-white"><h4 class="text-primary text-bold mb-1">Local Candidates - {{ ucwords($municipality) }}</h4></div>
            <div class="border mt-1 bg-white">
                <table class="table table-condensed mb-0">
                    <tbody>
                        <tr>
                            <td colspan="2" class="border-bottom bg-dark"><h4 class="text-center text-white mt-1">{{ ucwords($position) }}</h4></td>
                        </tr>
                        <tr>
                            <th class="px-4">Candidates</th>
                            <th class="px-4">Vote Counts</th>
                        </tr>
                        @foreach($localCandidates as $localCandidate)
                        <tr>
                            <td class="px-4">{{ $localCandidate['name'] }}</td>
                            <td class="px-4">{{ $localCandidate['vote_count'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection