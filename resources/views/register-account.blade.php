@extends('layout.main')

@section('title', 'New Admin')

@include('layout.navbar')

@section('content')
   
    <h4 class="text-center my-4">New Account</h4>
    <div class="row justify-content-center">
        <div class="col col-md-6 col-lg-5">

            @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Great!</strong> {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="/account/new" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Account Name</label>
                            <input type="text" class="form-control @error('account_name') is-invalid @enderror" name="account_name" value="{{ old('account_name') }}" placeholder="Enter Account Name">
                            @error('account_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Enter Username">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Repeat Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Repeat Password">
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        @if(auth()->user()->isSuperAdmin())
                        <div class="mb-3">
                            <label class="form-label">Municipality Assigned</label>

                            <select class="form-select @error('municipality') is-invalid @enderror" name="municipality">
                                <option selected>--Select Municipality --</option>
                                @foreach($municipalities as $municipality)
                                <option value="{{ $municipality }}" {{ old('municipality') == $municipality ? 'selected' : ''}}>{{ $municipality }}</option>
                                @endforeach
                            </select>

                            @error('municipality')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @endif


                        @if(auth()->user()->isSuperAdmin())
                        <div class="mb-3">
                            <label class="form-label">Account Type</label>

                            <select class="form-select @error('account_type') is-invalid @enderror" name="account_type">
                                <option selected>--Select an Account Type--</option>
                                @foreach($accountTypes as $accountType)
                                <option value="{{ $accountType }}" {{ old('account_type') == $accountType ? 'selected' : ''}}>{{ $accountType }}</option>
                                @endforeach
                            </select>

                            @error('account_type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @endif
                        

                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="Submit">Register</button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
   
@endsection
