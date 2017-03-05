<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function getIndex()
    {
        if (session('buddy_name') === null) {
            session(['buddy_name' => str_random(8)]);
        }

        return view('pages.register', [
            'buddy_name' => session('buddy_name'),
        ]);
    }

    public function postIndex(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email',
            'buddy_name' => 'required|file',
        ]);

        dd($request);
    }
}
