<!doctype html>
<html lang="en">
@include('shared.header')
<body background="/img/tlo.jpg" style="background-attachment: fixed">
    @include('shared.nav')

<div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
      <div class="card bg-black text-white" style="border-radius: 1rem;">
        <div class="card-body p-5 text-center">

          <div class="mb-md-5 mt-md-4 pb-5">

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
          <h1>Edytuj swoje dane</h1>
          <form action="{{ route('profil.update') }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-outline form-white mb-4">
                <label for="name">Imię:</label>
                <input type="text" name="name" value="{{ $user->name }}">
              </div>
              <div class="form-outline form-white mb-4">
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{ $user->email }}">
              </div>
              <!-- Pozostałe pola formularza -->

              <button class="btn btn-outline-success btn-lg px-5" type="submit">Zapisz zmiany</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@include('shared.footer')
</body>

</html>
