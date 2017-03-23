<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PasswordReset;
use App\Mail\RegistrationAccepted;
use App\Mail\RegistrationRejected;
use App\Models\Account;
use App\Models\Registration;
use axy\htpasswd\PasswordFile;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::where('is_spam', false)->orderBy('created_at', 'desc')->get();

        return view('pages.admin.registrations.index', compact('registrations'));
    }

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

        if ($status === 'accepted') {
            if (!$registration->account) {
                // todo: service class
                $password = str_random(8);

                try {
                    Mail::to($registration)->send(new RegistrationAccepted($registration, $password));
                } catch (Exception $e) {
                    $request->session()->flash('alert-danger', ('Er ging iets fout bij het mailen: ' . $e->getMessage()));
                    return redirect()->back();
                }

                $htpasswd = new PasswordFile(storage_path('.htpasswd'));
                $htpasswd->setPassword($registration->username, $password);
                $htpasswd->save();

                Account::create([
                    'registration_id' => $registration->id,
                ]);
            }

            // Clear spam flag if present
            if ($registration->is_spam) {
                $registration->is_spam = false;
            }
        }

        if ($status === 'rejected') {
            if ($request->get('reject_reason') === 'spam') {
                // Don't send mail on spam
                $registration->is_spam = true;

            } elseif ($registration->status === 'new') {
                // Only send one reject mail when changing status from 'new'

                Mail::to($registration)->send(new RegistrationRejected($registration));
            }
        }

        $registration->save();

        $request->session()->flash('alert-success', "De registratie voor {$registration->username} is {$label}");

        return redirect()->route('admin.dashboard');
    }
}
