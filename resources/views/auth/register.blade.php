<!doctype html>
<html lang="en">
@include('shared.header')
<body background="/img/tlo.jpg" style="background-attachment: fixed">
    @include('shared.nav')
    {{-- <div class="container mt-5 mb-5 text-white">
        @if (session('error'))
            <div class="row d-flex justify-content-center">
                <div class="alert alert-danger">{{ session('error') }}</div>
            </div>
        @endif
        <div class="row mt-4 mb-4 text-center">
            <h1>Zaloguj się</h1>
        </div>

        @if ($errors->any())
            <div class="row d-flex justify-content-center">
                <div class="col-6">
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

        <div class="row d-flex justify-content-center">
            <div class="col-10 col-sm-10 col-md-6 col-lg-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <label for="name">Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" required>
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required>
                    </div>

                    <button type="submit">Register</button>
                </form>
            </div>
        </div>
    </div> --}}

    <div class="container py-5 h-100">
        @if (session('error'))
        <div class="row d-flex justify-content-center">
            <div class="alert alert-danger">{{ session('error') }}</div>
        </div>
        @endif

        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-black text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">

                  <h2 class="fw-bold mb-2 text-uppercase">Rejestracja</h2>
                  <p class="text-white-50 mb-5">Proszę podaj potrzebne dane do rejestracji!</p>

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


            <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-outline form-white mb-4">
                        <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                        <label for="name">Name</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        <label for="email">Email</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input id="password" type="password" name="password" class="form-control" required>
                        <label for="password">Password</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                        <label for="password_confirmation">Confirm Password</label>
                    </div>

                  <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>


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
