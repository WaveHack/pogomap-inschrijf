<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function getLogin()
    {
        return view('pages.admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        return $this->login($request);
    }

    public function postLogout(Request $request)
    {
        return $this->logout($request);
    }
}
