<nav class="navbar navbar-expand-sm navbar-dark" id="neubar">
    <div class="container">
      <a class="navbar-brand" href="/"><img src="/img/mup_logo.png" height="60" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class=" collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item">
            <a class="nav-link mx-2 active" aria-current="page" href="/">Główna</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="/services">Usługi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="/contact">Kontakt</a>
          </li>
          <li class="nav-item">
            @if (Auth::check())
            <li class="nav-item dropdown">
                <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Konto
                </a>
                <ul class="dropdown-menu bg-black" aria-labelledby="navbarDropdownMenuLink">
                @can('is-admin')
                    <li><a class="dropdown-item text-white bg-black" href="{{ route('users.index') }}">Lista użytkowników</a></li>
                @endcan

                  <li><a class="dropdown-item text-white bg-black" href="{{ route('reservations.create')}}">Rezerwuj obsługę</a></li>
                  <li><a class="dropdown-item text-white bg-black" href="#">Moje rezereacje</a></li>
                  <li><a class="dropdown-item text-white bg-black" href="{{ route('logout') }}">{{ Auth::user()->name }}, wyloguj się...</a></li>
                </ul>
              </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Zaloguj się...</a>
                </li>
            @endif
        </li>
        </ul>
      </div>
    </div>
  </nav>
