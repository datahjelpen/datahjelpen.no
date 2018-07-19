<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;

use Mail;
use App\Mail\Generic;
use App\User;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $fields;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->fields = $request->all();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Filter out potential sensetive data
        if (isset($this->fields['_token']))                unset($this->fields['_token']);
        if (isset($this->fields['password']))              unset($this->fields['password']);
        if (isset($this->fields['password_confirmation'])) unset($this->fields['password_confirmation']);
        if (isset($this->fields['cc']))                    unset($this->fields['cc']);
        if (isset($this->fields['cvv']))                   unset($this->fields['cvv']);
        if (isset($this->fields['cvc']))                   unset($this->fields['cvc']);
        if (isset($this->fields['cc-exp']))                unset($this->fields['cc-exp']);
        if (isset($this->fields['ccname']))                unset($this->fields['ccname']);
        if (isset($this->fields['cardnumber']))            unset($this->fields['cardnumber']);

        $email = new Generic($this->fields);
        Mail::send($email);
    }
}
