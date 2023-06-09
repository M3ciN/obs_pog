<!doctype html>
<html lang="en">
@include('shared.header')
<body background="/img/tlo.jpg">
    @include('shared.nav')

<div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
      <div class="card bg-black text-white" style="border-radius: 1rem;">
        <div class="card-body p-5 text-center">

          <div class="mb-md-5 mt-md-4 pb-5">

            <h2 class="fw-bold mb-2 ">Rezerwacja usług</h2>
            <p class="text-white-50 mb-5">Rezerwujesz usługi pogrzebowe</p>

          @if ($errors->any())
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
          @endif


      <form method="POST" action="{{ route('reservation.store') }}" class="needs-validation" novalidate>
              @csrf

              <div class="form-outline form-white mb-4">
                <label for="phone_number">Numer telefonu:</label>
                <input type="text" name="phone_number" class="form-control" required>
            </div>

            <div class="form-outline form-white mb-4">
                <label for="address">Adres:</label>
                <input type="text" name="address" class="form-control" required>
            </div>

            <div class="form-outline form-white mb-4">
                <label for="date">Data:</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="form-outline form-white mb-4">
                <label for="time">Godzina:</label>
                <input type="time" name="time" class="form-control" required>
            </div>

            <div class="form-outline form-white mb-4">
                <label for="services">Usługi:</label><br>
                @foreach($services as $service)
                    <input type="checkbox" name="services[]" value="{{ $service->id }}"> {{ $service->name }}<br>
                @endforeach
            </div><br>

            <button class="btn btn-outline-light btn-lg px-5" type="submit">Rezerwuj</button>


        </div>
      </form>
        </div>
      </div>
    </div>
  </div>
</div>


@include('shared.footer')
</body>

</html>
