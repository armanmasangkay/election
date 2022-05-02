@extends('layout.main')

@section('title', 'Add Candidate')

@include('layout.navbar')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border bg-white rounded-md mt-4 px-4 py-3">
            <h4>Add Candidate</h4>
            <form action="" method="post">
                @csrf
                <div class="form-group mt-1">
                    <label for="">Candidate name</label>
                    <input class="form-control" type="text" name="candidate" placeholder="Enter candidate name...">
                </div>
                <div class="form-group mt-1">
                    <label for="">Municipality</label>
                    <input class="form-control" type="text" name="candidate" placeholder="Enter municipality...">
                </div>
                <div class="form-group mt-1">
                    <label for="">Position</label>
                    <input class="form-control" type="text" name="position" placeholder="Enter candidate position...">
                </div>
                <button class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection