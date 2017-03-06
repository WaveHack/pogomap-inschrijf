<?php

namespace App\Http\Controllers;

use App\Models\Registration;
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
            'username' => 'required|unique:registrations',
            'email' => 'required|email|unique:registrations',
            'buddy_file' => 'required|file',
            'terms' => 'required|accepted',
        ]);

        $buddyFilePath = $request->file('buddy_file')->store('buddy_files');

        $registration = new Registration([
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'buddy_name' => session('buddy_name'),
            'buddy_file_path' => $buddyFilePath,
        ]);
        $registration->save();

        $request->session()->flash('alert-success', "Je hebt je ingeschreven voor de map. Na goedkeuring krijg je een email op {$registration->email} met je wachtwoord.");

        return redirect()->route('register');
    }
}
