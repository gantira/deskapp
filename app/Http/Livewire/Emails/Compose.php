<?php

namespace App\Http\Livewire\Emails;

use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Compose extends Component
{
    public $email = [
        'to' => 'angga.gantira@gmail.com',
        'subject' => '',
        'body' => '',
    ];

    protected $rules = [
        'email.to' => 'required|email',
        'email.subject' => 'required',
        'email.body' => 'nullable',
    ];

    protected $validationAttributes = [
        'email.to' => 'to',
        'email.subject' => 'subject',
    ];

    public function sendEmail()
    {
        $this->validate();

        Mail::send(new UserRegistered($this->email));

        // check for failures
        if (Mail::failures()) {
            session()->flash('error', 'Send Email Failure!');

            return redirect()->route('email.compose');
        }

        session()->flash('message', 'Email sent!');

        return redirect()->route('email.compose');
    }

    public function render()
    {
        return view('livewire.emails.compose');
    }
}
