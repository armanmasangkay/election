@extends('layout.main')

@section('title', 'Add Candidate')

@include('layout.navbar')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <strong>Great!</strong> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card border bg-white rounded-md mt-4 px-4 py-3">
            <h4 class="my-3">Add Candidate</h4>
          
            <form action="/candidate/new" method="post">
                @csrf
                <div class="form-group mt-1">
                    <label for="">Name</label>
                    <input value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Enter candidate name...">
                    @error('name')
                    <div class="invalid-feedback">
                       {{ $message }}
                    </div>
                    @enderror
                </div>
                <label for="">Position</label>
                <select class="form-select @error('position') is-invalid @enderror" name="position">
                    <option selected>--Select Position--</option>
                    @foreach ($positions as $position)
                    <option {{ $position === old('position') ? 'selected' : ''  }}>{{ $position }}</option> 
                    @endforeach
                </select>
                @error('position')
                <div class="invalid-feedback">
                   {{ $message }}
                </div>
                @enderror

                <button class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection