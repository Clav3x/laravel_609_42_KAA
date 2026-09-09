<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function show($id)
    {
        $user = User::with('sessions')->findOrFail($id);
        return view('user', compact('user'));
    }
}
