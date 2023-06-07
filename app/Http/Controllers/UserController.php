<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showUsersWithRoleTwo()
    {
        $users = User::where('role_id', 2)->get();

        return view('users.index', ['users' => $users]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Inne pola, które chcesz edytować
        $user->save();
        return redirect()->route('users.index')->with('success', 'Dane użytkownika zostały zaktualizowane.');
    }
}
