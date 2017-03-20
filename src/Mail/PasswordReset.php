<?php

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    /** @var Registration */
    public $registration;

    /** @var string */
    public $password;

    /**
     * Create a new message instance.
     *
     * @param Registration $registration
     * @param string $password
     */
    public function __construct(Registration $registration, $password)
    {
        $this->registration = $registration;
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
