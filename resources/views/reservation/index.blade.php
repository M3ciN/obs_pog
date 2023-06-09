<!doctype html>
<html lang="en">
@include('shared.header')
<body background="/img/tlo.jpg">
    @include('shared.nav')
    <div class="container mt-5 text-white">
    <h1>Moje rezerwacje</h1>
    <table class="table bg-black text-white table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Godzina</th>
                <th>Numer telefonu</th>
                <th>Adres</th>
                <th>Wybrane usługi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->time }}</td>
                    <td>{{ $reservation->phone_number }}</td>
                    <td>{{ $reservation->address }}</td>
                    <td>
                        <ul>
                            @foreach($reservation->services as $service)
                                <li>{{ $service->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('reservation.create') }}" class="btn btn-outline-success btn-lg px-3">Dodaj kolejną rezerwacje</a>
    </div>
    @include('shared.footer')
</body>

</html>
