<div class="text-center text-muted mt-3">
@if(!Request::is('count*'))
    <p>
        Logged in as {{ auth()->user()->name }} ({{ auth()->user()->username }})
    </p>
    <p>
        Municipality: {{ auth()->user()->municipality }}
    </p>
@endif
    <div class="mt-5">
        <p>Developed by: SLSU-CCSIT Development Team</p>
        <p>Arman Masangkay | Benigno Ambus Jr.</p>
    </div>
</div>


