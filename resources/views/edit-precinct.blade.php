@extends('layout.main')

@section('title', 'Edit Prencinct')

@include('layout.navbar')

@section('content')

<h4 class="my-4">Editting Precinct - {{ $precinct->name }} </h4>

<div class="row justify-content-center">
    <div class="col col-md-6 col-lg-5">
        <form action="/precincts/update/{{ $precinct->id }}" method="post">
            @csrf
            
            <div class="mb-3">
                <label for="precinct_name" class="form-label">New Name</label>
                <input class="form-control" type="text" name="precinct_name">
            </div>
        
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection
