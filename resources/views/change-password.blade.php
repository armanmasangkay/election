@extends('layout.main')

@section('title', 'Change Password')

@include('layout.navbar')

@section('content')

    <div class="row justify-content-center">
        <div class="col col-md-6 col-lg-5">
  
            <h4 class="text-center my-4">Change Password</h4>

            @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Great!</strong> {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <form action="/change-password" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Current Password</label>
                    <input 
                    type="password" 
                    class="form-control @error('current_password') is-invalid @enderror" 
                    name="current_password" 
                    value="{{ old('current_password') }}" 
                    placeholder="Enter your Current Password">

                    @error('current_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input 
                    type="password" 
                    class="form-control @error('new_password') is-invalid @enderror" 
                    name="new_password" 
                    value="{{ old('new_password') }}" 
                    placeholder="Enter your New Password">

                    @error('new_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="Submit">Submit</button>
                </div>

            </form>
        </div>
    </div>

@endsection
