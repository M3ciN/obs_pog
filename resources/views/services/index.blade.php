<!doctype html>
<html lang="en">
@include('shared.header')
<body background="/img/tlo.jpg">
    @include('shared.nav')
    <div class="container mt-5 text-white">
    <h1>LISTA USŁUG</h1>
    <table class="table bg-black text-white table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa usługi</th>
                <th>Opis</th>
                <th>Cena(zł)</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->opis }}</td>
                <td>{{ $service->price }}</td>
                <td><a href="{{ route('services.edit', $service->id) }}">Edytuj</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    @include('shared.footer')
</body>

</html>
