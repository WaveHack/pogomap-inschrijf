<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function show(Registration $registration)
    {
        $path = (storage_path() . '/app/' . $registration->buddy_file_path);

        $mime = mime_content_type($path);
        $buddyImageData = base64_encode(file_get_contents($path));

        return view('pages.admin.registrations.show', compact(
            'registration',
            'mime',
            'buddyImageData'
        ));
    }

    public function update(Registration $registration, Request $request)
    {
        switch (true) {
            case $request->exists('accept'):
                $status = 'accepted';
                $label = 'goedgekeurd';
                break;

            case $request->exists('reject');
                $status = 'rejected';
                $label = 'afgekeurd';
                break;

            default:
                // todo: error flash
                return redirect()->route('admin.registrations.show', $registration);
        }

        $registration->fill([
            'status' => $status,
            'status_update_by_user_id' => auth()->user()->id,
            'status_update_at' => new Carbon,
        ]);

        if (($status === 'accepted') && $registration->is_spam) {
            $registration->is_spam = false;
        }

        if (($status === 'rejected') && ($request->get('reject_reason') === 'spam')) {
            $registration->is_spam = true;
        }

        $registration->save();

        // todo: send mail to user based on $status

        $request->session()->flash('alert-success', "De registratie is {$label}");

        return redirect()->route('admin.registrations.show', $registration);
    }
}
