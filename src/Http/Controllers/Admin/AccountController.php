<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PasswordReset;
use App\Models\Account;
use axy\htpasswd\PasswordFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    public function index()
    {
        return view('pages.admin.accounts.index', [
            'accounts' => Account::all(),
        ]);
    }

    public function show(Account $account)
    {
        return view('pages.admin.accounts.show', compact('account'));
    }

    // update?

    public function postResetPassword(Account $account, Request $request)
    {
        if ($account->registration->status !== 'accepted') {
            throw new \Exception('Expected registration status accepted, got ' . $account->registration->status);
        }

        // todo: service class
        $password = str_random(8);

        $htpasswd = new PasswordFile(storage_path('.htpasswd'));
        $htpasswd->setPassword($account->registration->username, $password);
        $htpasswd->save();

        Mail::to($account->registration)->send(new PasswordReset($account, $password));

        $request->session()->flash('alert-success', 'Het wachtwoord is gereset');

        return redirect()->route('admin.accounts.show', $account);
    }
}
