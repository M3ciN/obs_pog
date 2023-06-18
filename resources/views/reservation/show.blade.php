<!doctype html>
<html lang="en">
@include('shared.header')
<body background="/img/tlo.jpg" style="background-attachment: fixed">
    @include('shared.nav')

    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-black text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 ">

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


    <div class="container mt-5 text-white">
    <h1>Informacje o rezerwacji</h1>
    <h2>ID: {{ $reservation->id }}</h2>

    <p>Użytkownik: {{ $reservation->user->name }}</p>
    <p>Data: {{ $reservation->date }}</p>
    <p>Godzina: {{ $reservation->time }}</p>
    <p>Numer telefonu: {{ $reservation->phone_number }}</p>
    <p>Adres: {{ $reservation->address }}</p>
    <p> Usługi:
        @foreach($reservation->services as $service)
            <li>{{ $service->name }} | ({{ $service->price}} zł)</li>
        @endforeach
    </p>
    <p>Suma ceny: {{ $reservation->total_price }} zł</p>
    <p>Opcja płatności: {{ $reservation->pay_form }}</p>

<a href="{{ route('reservations.indexa') }}">Powrót do listy rezerwacji</a>
    </div>
</div>
</div>
</div>
</div>
</div>
    @include('shared.footer')
</body>
</html>

