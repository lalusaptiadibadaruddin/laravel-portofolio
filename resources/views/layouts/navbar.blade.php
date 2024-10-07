{{--
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="">Laravel9-AJAX</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('plants') }}">Plants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('category') ? 'active' : '' }}" href="{{ route('category') }}">Category</a>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}
{{--
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Portofolio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('dashboard') }}">Home</a>
            </li>



          </ul>

        </div>
    </div>

  </nav> --}}

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('dashboard') }}"><strong>Portfolio</strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Master
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('skill') }}">Skill</a></li>
              <li><a class="dropdown-item" href="{{ route('contact') }}">Media Social</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Biographical Data
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
              <li><a class="dropdown-item" href="{{ route('experience') }}">Experience</a></li>
              <li><a class="dropdown-item" href="{{ route('listSkill') }}">List Skill</a></li>
              <li><a class="dropdown-item" href="{{ route('contact') }}">Contact</a></li>
              <li><a class="dropdown-item" href="{{ route('interest') }}">Interest</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Management
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('user') }}"">User</a></li>
            </ul>
          </li>
        </ul>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/login">Logout</a>
              </li>

        </ul>

      </div>
    </div>
  </nav>
