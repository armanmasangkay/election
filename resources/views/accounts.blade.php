@extends('layout.main')

@section('title', 'Candidates')

@include('layout.navbar')

@section('content')

@if(session('message'))
<div class="alert alert-success d-flex align-items-center mt-4" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    {{ session('message') }}
  </div>
</div>
@endif

<h4 class="my-4">Accounts </h4>
<hr>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Account Name</th>
        <th scope="col">Account Username</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->type }}</td>
                <td>
                  <a href="/accounts/reset/{{ $user->id }}" onclick="return confirm('Proceed to reset password?')">
                      Reset Password
                  </a>
                </td>
            </tr>
        @empty
            <tr>
                <td class='text-center' colspan="2">No candidate to show!</td>
            </tr>
        @endforelse 
    </tbody>
  </table>
    
@endsection
