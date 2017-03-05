<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function getIndex()
    {
        return view('pages.register');
    }

    public function postIndex(Request $request)
    {
        dd($request);
    }
}
