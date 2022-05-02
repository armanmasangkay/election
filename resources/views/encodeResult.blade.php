@extends('layout.main')

@section('title', 'Encode Result')

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
                    <select class="form-select" name="" id="">
                        <option value="">-Select candidate-</option>
                    </select>
                </div>
                <div class="form-group mt-1">
                    <label for="">Vote Count</label>
                    <input class="form-control" type="number" name="candidate" placeholder="Enter count...">
                </div>
                <button class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection