<h1>Edytuj swoje dane</h1>
<form action="{{ route('profil.update') }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Imię:</label>
    <input type="text" name="name" value="{{ $user->name }}">

    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ $user->email }}">

    <!-- Pozostałe pola formularza -->

    <button type="submit">Zapisz zmiany</button>
</form>
