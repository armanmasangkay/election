<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PPCRV Quick Count</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }} " aria-current="page" href="/">Home</a>
          </li>
          @if(! auth()->user()->isSuperAdmin() && ! auth()->user()->isAdmin())
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Encode Result</a>
          </li>
          @endif

          @if(! auth()->user()->isPpcrv())
          <li class="nav-item">
            <a class="nav-link {{ request()->is('account/new') ? 'active' : '' }}" aria-current="page" href="/account/new">New Account</a>
          </li>
          @endif

          @if(auth()->user()->isAdmin())
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Candidates
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">New</a></li>
              <li><a class="dropdown-item" href="#">List</a></li>
            </ul>
          </li>
          @endif

          @if(! auth()->user()->isPpcrv())
          <li class="nav-item">
            <a class="nav-link {{ request()->is('precincts') ? 'active' : '' }} " aria-current="page" href="/precincts">Precincts</a>
          </li>  
          @endif

          <li class="nav-item">
            <a class="nav-link {{ request()->is('change-password') ? 'active' : '' }} " aria-current="page" href="/change-password">Change Password</a>
          </li>  
         
        </ul>
        <div class="d-flex">
            <a class="nav-link px-0" aria-current="page" href="/logout" style="color:#fff">Logout</a>
        </div>
      </div>
    </div>
  </nav>