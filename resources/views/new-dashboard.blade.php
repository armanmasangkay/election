@extends('layout.main')

@section('title', 'Dashboard')

@include('layout.navbar')

@section('content')

@if(session('message'))
<div class="alert alert-success d-flex align-items-center my-4" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
      {{ session('message') }}
    </div>
</div>
@endif

<div class="row">
    <div class="col-md-6">
        <div class="mt-4 mt-md-5">
            <div class="px-2 py-3 border bg-white"><h4 class="text-primary text-bold mb-1">Local Candidates</h4></div>
            <div class="border mt-1 bg-white">
                <table class="table table-condensed mb-0">
                    <tbody>
                        <tr>
                            <td colspan="2" class="border-bottom bg-dark"><h4 class="text-center text-white mt-1">Mayors</h4></td>
                        </tr>
                        <tr>
                            <th class="px-4">Candidates</th>
                            <th class="px-4">Vote Counts</th>
                        </tr>
                        @foreach($localCandidates as $localCandidate)
                        @if($localCandidate['position'] === 'Mayor')
                            <tr>
                                <td class="px-4">{{ $localCandidate['name'] }}</td>
                                <td class="px-4">{{ $localCandidate['vote_count'] }}</td>
                            </tr>
                        @endif
                        @endforeach
                        <tr>
                            <td colspan="2" class="border-bottom bg-dark"><h4 class="text-center text-white mt-1">Councilors</h4></td>
                        </tr>
                        <tr>
                            <th class="px-4">Candidates</th>
                            <th class="px-4">Vote Counts</th>
                        </tr>
                        @foreach($localCandidates as $localCandidate)
                        @if($localCandidate['position'] === 'Councilor')
                            <tr>
                                <td class="px-4">{{ $localCandidate['name'] }}</td>
                                <td class="px-4">{{ $localCandidate['vote_count'] }}</td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4 mt-md-5">
            <div class="px-2 py-3 border bg-white"><h4 class="text-primary text-bold mb-1">Provincial Candidates</h4></div>
            <div class="mb-2 border mt-1 bg-white">
                <table class="table table-condensed mb-0">
                    <tbody>
                        <tr>
                            <td colspan="2" class="border-bottom bg-dark"><h4 class="text-center text-white mt-1">House of Representatives</h4></td>
                        </tr>
                        <tr>
                            <th class="px-4">Candidates</th>
                            <th class="px-4">Vote Counts</th>
                        </tr>
                        <tr>
                            <td colspan="2" class="px-4"><h5>First District</h5></td>
                        </tr>
                        @foreach($nationalCandidates as $nationalCandidate)
                        @if($nationalCandidate['position'] === 'House of Representatives-First District')
                            <tr>
                                <td class="px-4">{{ $nationalCandidate['name'] }}</td>
                                <td class="px-4">{{ $nationalCandidate['vote_count'] }}</td>
                            </tr>
                        @endif
                        @endforeach
                        <tr>
                            <td colspan="2" class="border-bottom px-4"><h5>Second District</h5></td>
                        </tr>
                        @foreach($nationalCandidates as $nationalCandidate)
                        @if($nationalCandidate['position'] === 'House of Representatives-Second District')
                            <tr>
                                <td class="px-4">{{ $nationalCandidate['name'] }}</td>
                                <td class="px-4">{{ $nationalCandidate['vote_count'] }}</td>
                            </tr>
                        @endif
                        @endforeach
                        <tr>
                            <td colspan="2" class="border-bottom bg-dark"><h4 class="text-center text-white mt-1">Governor</h4></td>
                        </tr>
                        <tr>
                            <th class="px-4">Candidates</th>
                            <th class="px-4">Vote Counts</th>
                        </tr>
                        @foreach($nationalCandidates as $nationalCandidate)
                        @if($nationalCandidate['position'] === 'Governor')
                            <tr>
                                <td class="px-4">{{ $nationalCandidate['name'] }}</td>
                                <td class="px-4">{{ $nationalCandidate['vote_count'] }}</td>
                            </tr>
                        @endif
                        @endforeach
                        <tr>
                            <td colspan="2" class="border-bottom bg-dark"><h4 class="text-center text-white mt-1">Vice-Governor</h4></td>
                        </tr>
                        <tr>
                            <th class="px-4">Candidates</th>
                            <th class="px-4">Vote Counts</th>
                        </tr>
                        @foreach($nationalCandidates as $nationalCandidate)
                        @if($nationalCandidate['position'] === 'Vice-Governor')
                            <tr>
                                <td class="px-4">{{ $nationalCandidate['name'] }}</td>
                                <td class="px-4">{{ $nationalCandidate['vote_count'] }}</td>
                            </tr>
                        @endif
                        @endforeach
                        <tr>
                            <td colspan="2" class="border-bottom bg-dark"><h4 class="text-center text-white mt-1">Board Members</h4></td>
                        </tr>
                        <tr>
                            <th class="px-4">Candidates</th>
                            <th class="px-4">Vote Counts</th>
                        </tr>
                        <tr>
                            <td colspan="2" class="border-bottom px-4"><h5>First District</h5></td>
                        </tr>
                        @foreach($nationalCandidates as $nationalCandidate)
                        @if($nationalCandidate['position'] === 'Sangguniang Panlalawigan-First District')
                            <tr>
                                <td class="px-4">{{ $nationalCandidate['name'] }}</td>
                                <td class="px-4">{{ $nationalCandidate['vote_count'] }}</td>
                            </tr>
                        @endif
                        @endforeach
                        <tr>
                            <td colspan="2" class="border-bottom px-4"><h5>Second District</h5></td>
                        </tr>
                        @foreach($nationalCandidates as $nationalCandidate)
                        @if($nationalCandidate['position'] === 'Sangguniang Panlalawigan-Second District')
                            <tr>
                                <td class="px-4">{{ $nationalCandidate['name'] }}</td>
                                <td class="px-4">{{ $nationalCandidate['vote_count'] }}</td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mt-4 mt-md-5">
            <div class="px-2 py-3 border bg-white"><h4 class="text-primary text-bold mb-1">National Candidates</h4></div>
            <div class="mb-2 border mt-1 bg-white">
                <table class="table mb-0">
                    <tbody>
                        <tr>
                            <td colspan="2" class="border-bottom bg-dark"><h4 class="text-center text-white mt-1">Presidential Candidates</h4></td>
                        </tr>
                        <tr>
                            <th class="px-4">Candidates</th>
                            <th class="px-4">Vote Counts</th>
                        </tr>
                        @foreach($nationalCandidates as $nationalCandidate)
                        @if($nationalCandidate['position'] === 'President')
                            <tr>
                                <td class="px-4">{{ $nationalCandidate['name'] }}</td>
                                <td class="px-4">{{ $nationalCandidate['vote_count'] }}</td>
                            </tr>
                        @endif
                        @endforeach
                        <tr>
                            <td colspan="2" class="border-bottom bg-dark"><h4 class="text-center text-white mt-1">Senatorial Candidates</h4></td>
                        </tr>
                        <tr>
                            <th class="px-4">Candidates</th>
                            <th class="px-4">Vote Counts</th>
                        </tr>
                        @foreach($nationalCandidates as $nationalCandidate)
                        @if($nationalCandidate['position'] === 'Senators')
                            <tr>
                                <td class="px-4">{{ $nationalCandidate['name'] }}</td>
                                <td class="px-4">{{ $nationalCandidate['vote_count'] }}</td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection