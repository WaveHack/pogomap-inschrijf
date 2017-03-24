<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.admin.users.index', [
            'users' => User::all(),
        ]);
    }

    public function show(User $user)
    {
        return view('pages.admin.users.show', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        dd([$user, $request]);
    }
}