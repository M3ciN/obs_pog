<!doctype html>
<html lang="en">
@include('shared.header')
<body background="/img/tlo.jpg">
    @include('shared.nav')
    <div class="container mt-5 text-white">
        <h1>Wiadomości:</h1>
        @if($messages->count() > 0)
            <table class="table bg-black text-white table-bordered">
                <thead>
                    <tr>
                        <th>Imię</th>
                        <th>Email</th>
                        <th>Wiadomość</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->message }}</td>
                            <td>
                                <a href="{{ route('reply.form', $message->id) }}" class="btn btn-primary">Odpowiedz</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Brak wiadomości.</p>
        @endif
    </div>
    @include('shared.footer')
</body>

</html>