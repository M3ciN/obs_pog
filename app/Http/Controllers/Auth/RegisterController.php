<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class RegisterController extends Controller
{
    public function showRegistrationForm()
{
    return view('auth.register');
}

public function register(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
    ]);

    $role = Role::findOrFail(2); // Przykładowe pobranie roli z id równym 2
    $user->role()->associate($role);
    $user->save();

    // Dodatkowe operacje po rejestracji, na przykład wysłanie powiadomienia, itp.

    // Zaloguj użytkownika po rejestracji
    auth()->login($user);

    // Przekieruj na odpowiednią stronę po rejestracji
    return redirect()->route('obs_pog.index')->with('success', 'Dziękujemy! Rejestracja powiodła się.');
}
}
