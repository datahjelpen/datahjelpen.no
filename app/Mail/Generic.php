<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

use App\User;

class Generic extends Mailable
{
    use Queueable, SerializesModels;

    protected $fields;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fields)
    {
        $this->fields = $fields;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'New message';
        if (isset($this->fields['name'])) {
            $subject .= ' from ' . $this->fields['name'];
        }

        $from = config('app.email');
        if (isset($this->fields['email'])) {
            $from = $this->fields['email'];
        }

        $to = config('app.email_support');
        // $to = 'bjornar@datahjelpen.no';

        return $this->subject($subject)->from($from)->to($to)->view('email.generic')->with([
           'fields' => $this->fields,
           'subject' => $subject
        ]);
    }
}
