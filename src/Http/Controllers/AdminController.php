<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function getIndex()
    {
        if (auth()->guest()) {
            return redirect()->route('admin.login');
        }

        return redirect()->route('admin.dashboard');
    }

    public function getDashboard()
    {
        //
    }
}
