<?php

namespace App\Mail;

use App\Models\Account;
use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    /** @var Account */
    public $account;

    /** @var string */
    public $password;

    /**
     * Create a new message instance.
     *
     * @param Registration $account
     * @param string $password
     */
    public function __construct(Account $account, $password)
    {
        $this->account = $account;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Wachtwoord reset')
            ->markdown('emails.registration.password-reset');
    }
}
