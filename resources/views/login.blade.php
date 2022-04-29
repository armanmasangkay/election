@extends('layout.main')
@section('title','Log in')

@section('content')

<div class="row px-2 justify-content-center">
    <div class="col col-md-6 col-lg-4">
        <div class='text-center'>
            <h1 class="text-center mt-4">Election</h1>
            <h4 class='text-muted'>Sign in</h4>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Enter your Username">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your Password">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="Submit">Log in</button>
                    </div>
                
                </form>
            </div>
        </div>
    </div>
</div>


@endsection