<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;

class DashboardController extends Controller
{
    public function getIndex()
    {
        $registrations = Registration::doesntHave('account')->orderBy('created_at')->get();

        // todo: where is_spam == false

        return view('pages.admin.dashboard', compact('registrations'));
    }
}
