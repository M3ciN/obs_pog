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
      <!-- Carousel -->
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
    </div><br><br><br>

    <!-- Services -->

    <div class="container mt-8 text-white col-md-8" id="services">
        <h1>Lista usług</h1>
        <table class="table bg-black text-white table-bordered">
            <thead>
                <tr>
                    <th>Nazwa usługi</th>
                    <th>Opis</th>
                    <th>Cena(zł)</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->opis }}</td>
                    <td>{{ $service->price }}</td>
                </tr>
                @empty
                <tr>
                    <th scope="row" colspan="6">Brak wycieczek.</th>
                </tr>
                @endforelse
            </tbody>
        </table>
        </div><br><br><br>

  <!-- Contact -->

    <div class="container col-sm-12 col-md-6 text-white" id="contact">
        <h1>Kontakt</h1>
        <form method="POST" action="{{ route('contact.submit') }}">
            @csrf

            <div class="form-group mt-2 mb-3">
                <label for="name">Imię:</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="form-group mt-2 mb-3">
                <label for="email">E-mail:</label>
                <input type="email" name="email" class="form-control" id="eamil"
                    placeholder="name@example.com">
            </div>
            <div class="form-group mb-3">
                <label for="message">Wiadomość:</label>
                <textarea class="form-control" name="message" id="message" rows="5"></textarea>
            </div>
            <div class="form-group mb-3 d-flex justify-content-center">
                <button class="btn btn-outline-light btn-lg px-5" type="submit">Wyślij</button>
            </div>
        </form>
        </div><br><br><br>
    </div>
  @include('shared.footer')
  </body>
</html>
