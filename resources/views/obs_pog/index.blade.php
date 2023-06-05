<!doctype html>
<html lang="en">
  @include('shared.header')
  <body background="img/tlo.jpg">
    <!-- Navigation bar -->
    @include('shared.nav')
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
      <!-- Carousel bar -->
      <div class="carusel">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/obsluga.jpg" class="d-block w-100" alt="obsluga">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/trumny.jpg" class="d-block w-100" alt="trumny">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/wiazanki.jpg" class="d-block w-100" alt="wiazanki">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <!-- pakiety bar -->

    {{-- <div id="pakiety" class="container mb-5 text-light" style="padding-top: 5%;">
      <div class="row">
          <h1>Pakiety</h1>
      </div>
      <div class="row">
          @forelse ($random_trips as $t)
          <div class="col-12 col-sm-6 col-lg-3">
              <div class="card bg-black">
                  <img src="{{ asset('storage/img/'.$t->img) }}" class="card-img-top">
                  <div class="card-body">
                      <h5 class="card-title">{{ $t->name }}</h5>
                      <p class="card-text">{{ $t->description }}</p>
                      <a href="{{route('trips.show', ['id' => $t->id])}}" class="btn btn-primary bg-black">Więcej szczegółów...</a>
                  </div>
              </div>
          </div>
          @empty
                <p>Brak pakietów.</p>
          @endforelse
      </div>
  </div> --}}

  <!-- cennik bar -->

  {{-- <div id="cennik" class="container mt-5 mb-5 text-light">
    <div class="row">
        <h1>Cennik</h1>
    </div>
    <table class="table table-hover table-striped text-light bg-black">
        <thead>
            <tr class="text-light">
                <th scope="col">#</th>
                <th scope="col">Nazwa wycieczki</th>
                <th scope="col">Kontynent</th>
                <th scope="col">Kraj</th>
                <th scope="col">Okres</th>
                <th scope="col">Cena</th>
                @can('is-admin') <th scope="col">#</th> @endcan
            </tr>
        </thead>
        <tbody>
            @forelse ($trips as $t)
            <tr class="text-light">
                <th scope="row">{{$t->id}}</th>
                <td>{{$t->name}}</td>
                <td>{{$t->continent}}</td>
                <td>{{$t->country->name}}</td>
                <td>{{$t->period}} dni</td>
                <td>{{$t->price}} PLN</td>
                @can('is-admin') <td><a href="{{route('trips.edit', $t->id)}}">Edycja</a></td> @endcan
            </tr>
            @empty
            <tr>
                <th scope="row" colspan="6">Brak wycieczek.</th>
            </tr>
            @endforelse
        </tbody>
    </table>
  </div> --}}
  @include('shared.footer')
  </body>
</html>
