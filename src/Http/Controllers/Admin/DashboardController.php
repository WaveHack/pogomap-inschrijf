<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;

class DashboardController extends Controller
{
    public function getIndex()
    {
        $registrations = Registration::where('status', 'new')->orderBy('created_at')->get();

        return view('pages.admin.dashboard', compact('registrations'));
    }
}
