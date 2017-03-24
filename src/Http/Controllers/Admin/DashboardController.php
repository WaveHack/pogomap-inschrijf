<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;

class DashboardController extends Controller
{
    public function getIndex()
    {
        $registrations = Registration::where('status', 'new')->orderBy('created_at')->get();

        if (strncasecmp(PHP_OS, 'WIN', 3) === 0) {
            $load = ['0.01', '0.05', '0.15 (test)'];
        } else {
            $load = sys_getloadavg();
        }

        return view('pages.admin.dashboard', compact(
            'registrations',
            'load'
        ));
    }
}
