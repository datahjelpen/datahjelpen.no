<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Velkommen som kunde hos ' . config('app.name_legal');
        $from = config('app.email');
        $to = $this->user->email;

        return $this->subject($subject)->from($from)->to($to)->view('email.welcome')->with([
           'email_token' => $this->user->email_token,
           'subject' => $subject
        ]);
    }
}