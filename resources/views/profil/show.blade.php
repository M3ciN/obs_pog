<h1>Twoje dane</h1>
<p>Imię: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>

<a href="{{ route('profil.edit') }}">Edytuj moje dane</a>
