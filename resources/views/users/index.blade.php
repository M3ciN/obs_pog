<!doctype html>
<html lang="en">
@include('shared.header')
<body background="/img/tlo.jpg">
    @include('shared.nav')
    <div class="container mt-5 text-white">
        <h1>Użytkownicy:</h1>

        <table class="table bg-black text-white table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imię</th>
                    <th>Email</th>
                    <th></th>
                    <!-- Dodaj inne pola, które chcesz wyświetlić -->
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a href="{{ route('users.edit', $user->id) }}">Edytuj</a></td>
                        <!-- Dodaj inne pola, które chcesz wyświetlić -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('shared.footer')
</body>

</html>
