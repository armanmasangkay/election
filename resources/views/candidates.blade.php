@extends('layout.main')

@section('title', 'Candidates')

@include('layout.navbar')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Position</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($candidates as $candidate)
            <tr>
                <td>{{ $candidate->name }}</td>
                <td>{{ $candidate->position }}</td>
            </tr>
        @empty
            <tr>
                <td class='text-center' colspan="2">No candidate to show!</td>
            </tr>
        @endforelse 
    </tbody>
  </table>
    
@endsection
