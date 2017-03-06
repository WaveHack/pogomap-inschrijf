<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function show(Registration $registration)
    {
        // todo: get mime for base64 img src
        $buddyImageData = base64_encode(file_get_contents(storage_path() . '/app/' . $registration->buddy_file_path));

        return view('pages.admin.registrations.show', compact(
            'registration',
            'buddyImageData'
        ));
    }

    public function update(Registration $registration, Request $request)
    {
        dd($request);
    }
}
