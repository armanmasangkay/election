<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 py-md-0">
    <div class="container">
      <a class="navbar-brand" href="#">PPCRV Quick Count</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse py-3 ps-md-5" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item px-1">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }} " aria-current="page" href="/"><i class="fas fa-home me-1"></i> Home</a>
          </li>
          @if(auth()->user()->isPpcrv())
          <li class="nav-item px-1">
            <a class="nav-link {{ request()->is('encode') ? 'active' : '' }}" aria-current="page" href="/encode"><i class="fas fa-pencil me-1"></i> Encode Result</a>
          </li>
          @endif

          @if(! auth()->user()->isPpcrv())
          <li class="nav-item dropdown px-1">
            <a class="nav-link dropdown-toggle  {{ request()->is('account/*') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user me-1"></i> Accounts
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/account/new">New</a></li>
              <li><a class="dropdown-item" href="/accounts">List</a></li>
            </ul>
            {{-- <a class="nav-link {{ request()->is('account/new') ? 'active' : '' }}" aria-current="page" href="/account/new"><i class="fas fa-user me-1"></i>New</a> --}}
          </li>
          @endif

          @if(auth()->user()->isAdmin())
          <li class="nav-item dropdown px-1">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user me-1"></i> Candidates
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/candidate/new">New</a></li>
              <li><a class="dropdown-item" href="/candidates">List</a></li>
            </ul>
          </li>
          <li class="nav-item px-1">
            <a class="nav-link {{ request()->is('precincts') ? 'active' : '' }} " aria-current="page" href="/precincts"><i class="fas fa-building me-1"></i> Precincts</a>
          </li>  
          <li class="nav-item px-1">
            <a class="nav-link {{ request()->is('reports') ? 'active' : '' }}" aria-current="page" href="/reports"><i class="fas fa-file me-1"></i> Reports</a>
          </li>
          @endif

          <li class="nav-item px-1">
            <a class="nav-link {{ request()->is('change-password') ? 'active' : '' }} " aria-current="page" href="/change-password"><i class="fas fa-key me-1"></i> Change Password</a>
          </li>  
         
        </ul>
        <div class="d-flex">
            <a class="nav-link px-1 px-md-0" aria-current="page" href="/logout" style="color:#fff"><i class="fas fa-sign-out me-2"></i>Logout</a>
        </div>
      </div>
    </div>
  </nav>