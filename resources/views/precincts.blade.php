@extends('layout.main')

@section('title', 'Precincts')

@include('layout.navbar')

@section('content')

<h4 class="mt-4">Add New Precinct</h4>
<form action="/precincts/new" method="post">
    @csrf
    <div class="d-flex align-items-end">
        <div class="me-2">
            <label class="form-label">Name</label>
            <input 
            type="text" 
            class="form-control @error('precinct_name') is-invalid @enderror" 
            name="precinct_name" 
            placeholder="Enter Precinct Name">

            @error('precinct_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </div>

</form>

<h4>Precincts in ({{ auth()->user()->municipality }})</h4>

<table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($precincts as $precinct)
        <tr>
            <td style="width: 80%">{{ $precinct->name }}</td>
            <td style="width: 20%">
                
                <a href="/precincts/edit/{{ $precinct->id }}">Edit</a>

                <a 
                href="/precincts/delete/{{ $precinct->id }}" 
                onclick="return confirm(
                    'Are you sure you want to delete {{$precinct->name}}?'
                )">
                    Delete
                </a>
            </td>
        </tr>   
        @empty
        <tr>
            <td class="text-center">No precinct to show!</td>
        </tr>   
        @endforelse
      
      
    </tbody>
  </table>
    
@endsection
