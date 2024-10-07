

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('dashboard') }}"><strong>Portfolio</strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('frontProfil') }}">Profile</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('frontExperience') }}">Experience</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('frontSkill') }}">Skills</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('frontKontak') }}">Contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('frontInterest') }}">Interest</a>
          </li>

        </ul>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>

        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
              </li>

        </ul>

      </div>
    </div>
  </nav>
