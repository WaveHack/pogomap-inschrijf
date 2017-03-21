<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();

        return view('pages.admin.accounts.index', compact('accounts'));
    }

    public function show(Account $account)
    {
        dd([$account, $account->registration]);
        // todo
    }
}
