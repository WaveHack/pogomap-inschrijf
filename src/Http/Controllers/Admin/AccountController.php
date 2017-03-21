<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();

        return view('pages.admin.accounts.index', compact('accounts'));
    }

    public function show(Account $account)
    {
        return view('pages.admin.accounts.show', compact(
            'account'
        ));
    }

    // update?

    public function postResetPassword(Account $account, Request $request)
    {
        if ($account->registration->status !== 'accepted') {
            throw new \Exception('Expected registration status accepted, got ' . $registration->status);
        }

        // todo

//        $password = $this->generateAndSavePassword($registration);
//
//        Mail::to($registration)->send(new PasswordReset($registration, $password));
//
        $request->session()->flash('alert-success', 'Het wachtwoord is gereset');

        return redirect()->route('admin.accounts.show', $account);
    }
}
