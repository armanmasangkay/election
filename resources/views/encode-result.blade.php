@extends('layout.main')

@section('title', 'Dashboard')

@include('layout.navbar')

@section('content')

@if($error)
<div class="alert alert-success d-flex align-items-center my-4" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
     {{ $error }}
    </div>
</div>

@else


<h4 class="my-4 text-center">Encode Result</h4>

<div class="alert alert-primary d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
    <div>
      NOTE: You can leave the fields blank if it does not have any votes. Blank fields will default to zero.
    </div>
</div>

@if(! empty($errors->any()))

<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
        An error occured while submitting votes. Please make sure that votes does not include decimal points or is a number.
    </div>
</div>
@endif

<form action="encode" method="post">
    @csrf
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                <strong>Presidents</strong>
                </div>
                <div class="card-body">
                    @forelse ($presidents as $president)
                        <label for="">{{ $president->name }}</label>
                        <input type="number" class="form-control" name="candidate_{{ $president->id }}" value="0" >
                        <hr>
                    @empty
                        No data found
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mt-4 mt-md-0">
                <div class="card-header">
                <strong>Vice Presidents</strong>
                </div>
                <div class="card-body">
                    @forelse ($vice_presidents as $vice_president)
                        <label for="">{{ $vice_president->name }}</label>
                        <input type="number" class="form-control" name="candidate_{{ $vice_president->id }}" value="0" >
                        <hr>
                    @empty
                        No data found
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mt-4 mt-lg-0">
                <div class="card-header">
                <strong>Senators</strong>
                </div>
                <div class="card-body">
                    @forelse ($senators as $senator)
                        <label for="">{{ $senator->name }}</label>
                        <input type="number" class="form-control" name="candidate_{{ $senator->id }}" value="0" >
                        <hr>
                    @empty
                        No data found
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mt-4">
                <div class="card-header">
                <strong>Governor</strong>
                </div>
                <div class="card-body">
                    @forelse ($governors as $governor)
                        <label for="">{{ $governor->name }}</label>
                        <input type="number" class="form-control" name="candidate_{{ $governor->id }}" value="0" >
                        <hr>
                    @empty
                        No data found
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mt-4">
                <div class="card-header">
                <strong>Vice-Governor</strong>
                </div>
                <div class="card-body">
                    @forelse ($vice_governors as $vice_governor)
                        <label for="">{{ $vice_governor->name }}</label>
                        <input type="number" class="form-control" name="candidate_{{ $vice_governor->id }}" value="0" >
                        <hr>
                    @empty
                        No data found
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mt-4">
                <div class="card-header">
                <strong>Sangguniang Panlalawigan-First District</strong>
                </div>
                <div class="card-body">
                    @forelse ($sg_firsts as $sg_first)
                        <label for="">{{ $sg_first->name }}</label>
                        <input type="number" class="form-control" name="candidate_{{ $sg_first->id }}" value="0">
                        <hr>
                    @empty
                        No data found
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mt-4">
                <div class="card-header">
                <strong>Sangguniang Panlalawigan-Second District</strong>
                </div>
                <div class="card-body">
                    @forelse ($sg_seconds as $sg_second)
                        <label for="">{{ $sg_second->name }}</label>
                        <input type="number" class="form-control" name="candidate_{{ $sg_second->id }}" value="0" >
                        <hr>
                    @empty
                        No data found
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mt-4">
                <div class="card-header">
                <strong>House of Representatives-First District</strong>
                </div>
                <div class="card-body">
                    @forelse ($hgFirsts as $hgFirst)
                        <label for="">{{ $hgFirst->name }}</label>
                        <input type="number" class="form-control" name="candidate_{{ $hgFirst->id }}" value="0">
                        <hr>
                    @empty
                        No data found
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mt-4">
                <div class="card-header">
                <strong>House of Representatives-Second District</strong>
                </div>
                <div class="card-body">
                    @forelse ($hgSeconds as $hgSecond)
                        <label for="">{{ $hgSecond->name }}</label>
                        <input type="number" class="form-control" name="candidate_{{ $hgSecond->id }}" value="0" >
                        <hr>
                    @empty
                        No data found
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mt-4">
                <div class="card-header">
                <strong>Mayors</strong>
                </div>
                <div class="card-body">
                    @forelse ($mayors as $mayor)
                        <label for="">{{ $mayor->name }}</label>
                        <input type="number" class="form-control" name="candidate_{{ $mayor->id }}" value="0">
                        <hr>
                    @empty
                        No data found
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mt-4">
                <div class="card-header">
                <strong>Vice-Mayors</strong>
                </div>
                <div class="card-body">
                    @forelse ($vicemayors as $vicemayor)
                        <label for="">{{ $vicemayor->name }}</label>
                        <input type="number" class="form-control" name="candidate_{{ $vicemayor->id }}" value="0" >
                        <hr>
                    @empty
                        No data found
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mt-4">
                <div class="card-header">
                <strong>Councilors</strong>
                </div>
                <div class="card-body">
                    @forelse ($councilors as $councilor)
                        <label for="">{{ $councilor->name }}</label>
                        <input type="number" class="form-control" name="candidate_{{ $councilor->id }}" value="0" >
                        <hr>
                    @empty
                        No data found
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="d-grid gap-2">
        <button class="btn btn-primary mt-4 " type="submit" onclick="return confirm('PLEASE DOUBLE-CHECK VOTES BEFORE SUBMITTING! THIS ACTION CANNOT BE UNDONE!')">Submit</button>
    </div>
</form>
@endif


@endsection
