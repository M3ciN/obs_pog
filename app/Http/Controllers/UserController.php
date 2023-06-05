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
}
